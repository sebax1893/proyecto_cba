<?php

namespace CBA\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use CBA\Http\Requests;
use CBA\Estudiante;
use CBA\Banda_estudiante;
use CBA\Pariente;
use CBA\Banda;
use CBA\Parentesco;
use CBA\Estudiante_pariente;
use CBA\Subregion;

// use CBA\TipoDocumento

class EstudianteController extends Controller
{

    public function __construct(Estudiante $estudiante, Pariente $pariente, Estudiante_pariente $estudiante_pariente, Banda_estudiante $banda_estudiante) {

        $this->middleware('auth');
        // $this->middleware('admin', ['only' => ['create', 'edit', 'update', 'destroy']]);
        $this->middleware('admin', ['except' => ['index']]);

        $this->estudiante = $estudiante;
        $this->pariente = $pariente;
        $this->estudiante_pariente = $estudiante_pariente;
        $this->banda_estudiante = $banda_estudiante;
    }

    public function obtenerSubregion(Request $request)
    {
        $id = $request->input('id_municipio');        

        $subregion = Subregion::join('municipios', function ($join) use ($id) {
            $join->on('subregions.id_subregions', '=', 'municipios.id_subregions')
                 ->where('municipios.id_municipios', '=', $id);
            })
            ->select('subregions.nombre')
            ->get();

        if ($request->ajax()) {            
            return response()->json($subregion);
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiante = Estudiante::All();
        $pp = Pariente::All();
        $bb = Banda::All();
        
        return view('estudiante.index', compact('estudiante', 'pp', 'bb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoDocumento = \DB::table('tipo_documentos')->lists('nombre', 'id_tipo_documentos');
        $eps = \DB::table('eps')->lists('nombre', 'id_eps');
        $municipio = \DB::table('municipios')->lists('nombre', 'id_municipios');
        $parentesco = Parentesco::all(['id_parentescos', 'nombre']);
        $banda = Banda::all(['id_bandas', 'nombre']);
        
        return view('estudiante.create', compact('tipoDocumento', 'eps', 'municipio', 'parentesco', 'banda'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       

        $this->validate($request, [
            'id_tipo_documentos' => 'required',
            'id_eps' => 'required',
            'id_municipios' => 'required',
            'numeroIdentificacion' => 'required|numeric',            
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'edad' => 'required|numeric',
            'fechaNacimiento' => 'required|date',            
            'direccion' => 'required|string',
            'barrio' => 'required|string',
            'telefono' => 'required',
            'correo' => 'required|email',
            // 'foto' => 'image|mimes:jpg,jpeg,png',            
            'parientes.*.id_parentescos' => 'required',
            'parientes.*.nombre' => 'required',
            'bandas.*.id_bandas' => 'required',
        ]);

        $inputParientes = $request->input('parientes');        

        $idsParientes = [];

        foreach($inputParientes as $data)
        {
             $idsParientes[] = $this->pariente->insertGetId($data);
        }

        $estudiante = Estudiante::create($request->all()); 

        $idEstudiante = $estudiante->id_estudiantes;                

        /* Registrar en la tabla de detalle estudiante_pariente */
        $dataEstudiantePariente = [];

        $es_representante = false;

        for ($i=0; $i < count($idsParientes); $i++) { 

            if ($i == 0) {
                $es_representante = true;
            } else {
                $es_representante = false;
            }

            $dataEstudiantePariente = [
                "id_estudiantes" => $idEstudiante,
                "id_parientes" => $idsParientes[$i],
                "es_representante" => $es_representante,
            ];

            $this->estudiante_pariente->insert($dataEstudiantePariente);
        }

        /* Registrar en la tabla de banda_estudiante */
        $inputBandas = $request->input('bandas');       

        $asiste = false;

        for ($i=0; $i < count($inputBandas); $i++) { 

            if ($i == 0) {
                $asiste = true;
            } else {
                $asiste = false;
            }

            $dataEstudiantePariente = [
                "id_bandas" => $inputBandas[$i]['id_bandas'],
                "id_estudiantes" => $idEstudiante,
                "asiste" => $asiste,
            ];

            $this->banda_estudiante->insert($dataEstudiantePariente);
        }

        return redirect('/estudiante')->with('message','Estudiante registrado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id); 
        $this->notFound($banda);       
        $tipoDocumento = \DB::table('tipo_documentos')->lists('nombre', 'id_tipo_documentos');
        $eps = \DB::table('eps')->lists('nombre', 'id_eps');
        // $bandis = \DB::table('bandas')->lists('nombre', 'id_bandas');
        $estudiante->bandas()->lists('nombre','id_bandas');
        $municipio = \DB::table('municipios')->lists('nombre', 'id_municipios');
        $parentesco = Parentesco::all(['id_parentescos', 'nombre']);
        // $banda = Banda::all(['id_bandas', 'nombre']);
        
        return view('estudiante.edit', compact('estudiante', 'tipoDocumento', 'eps', 'municipio', 'parentesco')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            // 'id_tipo_documentos' => 'required',
            // 'id_eps' => 'required',
            // 'id_municipios' => 'required',
            // 'numeroIdentificacion' => 'required|numeric',            
            // 'nombres' => 'required|string',
            // 'apellidos' => 'required|string',
            // 'edad' => 'required|numeric',
            // 'fechaNacimiento' => 'required|date',            
            // 'direccion' => 'required|string',
            // 'barrio' => 'required|string',
            // 'telefono' => 'required',
            // 'correo' => 'required|email',
            // 'foto' => 'image|mimes:jpg,jpeg,png',                 
            // 'parientes.*.id_parentescos' => 'required',
            // 'parientes.*.nombre' => 'required',
            // 'bandas.*.id_bandas' => 'required',                
        ]);

        $estudiante = Estudiante::findOrFail($id);
        $this->notFound($banda);
        $estudiante->fill($request->all());
        $estudiante->save();

        Session::flash('message', 'Estudiante modificado correctamente');
        return Redirect::to('/estudiante');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::find($id);
        $this->notFound($banda);
        $estudiante->delete();
        Session::flash('message', 'Estudiante eliminado correctamente');
        return Redirect::to('/estudiante');
    }
}
