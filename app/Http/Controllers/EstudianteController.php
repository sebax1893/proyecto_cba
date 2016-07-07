<?php

namespace CBA\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use CBA\Http\Requests;
use CBA\Estudiante;
use CBA\Banda_estudiante;
use CBA\Pariente;
use CBA\Estudiante_pariente;
// use CBA\TipoDocumento

class EstudianteController extends Controller
{

    public function __construct(Estudiante $estudiante, Pariente $pariente, Estudiante_pariente $estudiante_pariente) {

        $this->middleware('auth');
        // $this->middleware('admin', ['only' => ['create', 'edit', 'update', 'destroy']]);
        $this->middleware('admin', ['except' => ['index']]);

        $this->estudiante = $estudiante;
        $this->pariente = $pariente;
        $this->estudiante_pariente = $estudiante_pariente;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiante = Estudiante::All();
        
        // $users = User::onlyTrashed()->get();
        return view('estudiante.index', compact('estudiante'));
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
        $parentesco = \DB::table('parentescos')->lists('nombre', 'id_parentescos');
        
        return view('estudiante.create', compact('tipoDocumento', 'eps', 'municipio', 'parentesco'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pariente $pariente)
    {       

        $this->validate($request, [
            'id_tipo_documentos' => 'required',
            'id_eps' => 'required',
            'id_municipios' => 'required',            
            'nombres' => 'required|string',
        ]);

        $input = $request->input('parientes');

        $ids = [];

        foreach($input as $data)
        {
             $ids[] = $this->pariente->insertGetId($data);
        }

        $estudiante = Estudiante::create($request->all()); 

        $idEstudiante = $estudiante->id_estudiantes;        

        // var_dump("the student id i nenedd:" . $idEstudiante);

        /* Registrar en la tabla de detalle estudiante_pariente */
        $dataEstudiantePariente = [];

        $es_representante = false;

        for ($i=0; $i < count($ids); $i++) { 

            if ($i == 0) {
                $es_representante = true;
            } else {
                $es_representante = false;
            }

            $dataEstudiantePariente = [
                "id_estudiantes" => $idEstudiante,
                "id_parientes" => $ids[$i],
                "es_representante" => $es_representante,
            ];

            $this->estudiante_pariente->insert($dataEstudiantePariente);

        }

        // var_dump($dataEstudiantePariente);        

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
