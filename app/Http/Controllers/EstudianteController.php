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
        $this->middleware('admin', ['except' => ['index', 'show']]);

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
        $parentescoList = \DB::table('parentescos')->lists('nombre', 'id_parentescos');
        $bandaList = \DB::table('bandas')->lists('nombre', 'id_bandas');
        $parentesco = Parentesco::all(['id_parentescos', 'nombre']);
        $banda = Banda::all(['id_bandas', 'nombre']);
        
        return view('estudiante.create', compact('tipoDocumento', 'eps', 'municipio', 'parentesco', 'banda', 'parentescoList', 'bandaList'));
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
            'foto' => 'image|mimes:jpg,jpeg,png',            
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

        var_dump($idsParientes);

        for ($i=0; $i < count($idsParientes); $i++) { 

            if ($i == 0) {
                $es_representante = true;
            } else {
                $es_representante = false;
            }

            // $dataEstudiantePariente = [
            //     "id_estudiantes" => $idEstudiante,
            //     "id_parientes" => $idsParientes[$i],
            //     "es_representante" => $es_representante,
            // ];

            $estudiante->parientes()->attach($idsParientes[$i]['id_parientes'], ['es_representante' => $es_representante]);
        }

        /* Registrar en la tabla de banda_estudiante */
        $dataBandaEstudiante = [];

        $inputBandas = $request->input('bandas');       

        $asiste = false;

        for ($i=0; $i < count($inputBandas); $i++) { 

            if ($i == 0) {
                $asiste = true;
            } else {
                $asiste = false;
            }

            // $dataBandaEstudiante = [
            //     "id_bandas" => $inputBandas[$i]['id_bandas'],
            //     "id_estudiantes" => $idEstudiante,
            //     "asiste" => $asiste,
            // ];         

            $estudiante->bandas()->attach($inputBandas[$i]['id_bandas'], ['asiste' => $asiste]);   

        }

        // var_dump($dataBandaEstudiante);

        // $estudiante->bandas()->attach($dataBandaEstudiante);

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
        $estudiante = Estudiante::findOrFail($id); 
        // $this->notFound($estudiante);   
        $pp = Pariente::All();
        $bb = Banda::All();
        return view('estudiante.show', compact('estudiante', 'pp', 'bb'));
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
        // $this->notFound($estudiante);       
        $tipoDocumento = \DB::table('tipo_documentos')->lists('nombre', 'id_tipo_documentos');
        $municipio = \DB::table('municipios')->lists('nombre', 'id_municipios');
        $eps = \DB::table('eps')->lists('nombre', 'id_eps');
        $banda = \DB::table('bandas')->lists('nombre', 'id_bandas');
        $bandas = Banda::all(['id_bandas', 'nombre']);
        $estudiantePariente = $estudiante->parientes->lists('nombre', 'id_parientes');
        $countParientes = $estudiantePariente->count();
        $estudianteBandas = $estudiante->bandas->lists('nombre', 'id_bandas');        
        $countBandas = $estudianteBandas->count();
        $parentesco = \DB::table('parentescos')->lists('nombre', 'id_parentescos');
        $parentescos = Parentesco::all(['id_parentescos', 'nombre']);

        $cosa = [];

        $aux = 0;

        foreach ($estudiante->bandas as $pivotEstudiante) {
            
            $cosa [] = $pivotEstudiante->pivot->asiste;

            $aux++;
        } 
        
        return view('estudiante.edit', compact('estudiante', 'tipoDocumento', 'eps', 'municipio', 'parentesco', 'banda', 'countParientes', 'countBandas', 'parentescos', 'bandas', 'estudianteBandas', 'cosa', 'aux')); 
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
            'foto' => 'image|mimes:jpg,jpeg,png',                 
            'parientes.*.id_parentescos' => 'required',
            'parientes.*.nombre' => 'required',
            'bandas.*.id_bandas' => 'required',                
        ]);

        $estudiante = Estudiante::findOrFail($id);
        // $this->notFound($estudiante);
        $estudiante->fill($request->all());
        $estudiante->save();

        /* Registrar parientes */
        $inputParientes = $request->input('parientes');

        $idsParientes = [];

        $arrayParientes = [];
       
        foreach($inputParientes as $data)
        {
            $idsParientes[] = $this->pariente->insertGetId($data);             
        }        
        
        /* Registrar en la tabla de detalle estudiantes_pariente */
        $arrayParientes[] = ['id_parientes' => $idsParientes[0], 'es_representante' => true];  

        for ($i=1; $i < count($idsParientes); $i++) { 
           
            $arrayParientes[] = ['id_parientes' => $idsParientes[$i], 'es_representante' => false];
        }

        $estudiante->parientes()->sync($arrayParientes);

        /* Registrar en la tabla de banda_estudiante */
        $arrayBandas = [];
        $aux = [];
        $inputBandas = $request->input('bandas');       

        $asiste = false;
        // ksort($inputBandas);
        // var_dump($inputBandas);

        foreach ($inputBandas as $value) {
            $aux[] = $value['id_bandas'];
        }

        var_dump($aux);

        for ($i=0; $i < count($aux); $i++) { 

            if ($i == 0) {
                $asiste = true;
            } else {
                $asiste = false;
            }

            $arrayBandas [] = [
                "id_bandas" => $aux[$i],
                "id_estudiantes" => $id,
                "asiste" => $asiste,
            ];

        }

        $estudiante->bandas()->sync($arrayBandas);

        Session::flash('message', 'Estudiante modificado correctamente');
        return Redirect::to('/estudiante');
        // return redirect('/estudiante')->with('message','Estudiante registrado correctamente');
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
        $this->notFound($estudiante);
        $estudiante->delete();
        Session::flash('message', 'Estudiante eliminado correctamente');
        return Redirect::to('/estudiante');
    }
}
