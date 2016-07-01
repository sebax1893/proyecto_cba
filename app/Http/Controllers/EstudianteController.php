<?php

namespace CBA\Http\Controllers;

use Illuminate\Http\Request;

use CBA\Http\Requests;
use CBA\Estudiante;
use CBA\Banda_estudiante;
use CBA\Pariente;
use Input;
// use CBA\TipoDocumento

class EstudianteController extends Controller
{

    public function __construct(Estudiante $estudiante, Pariente $pariente) {

        $this->middleware('auth');
        // $this->middleware('admin', ['only' => ['create', 'edit', 'update', 'destroy']]);
        $this->middleware('admin', ['except' => ['index']]);

        $this->estudiante = $estudiante;
        $this->pariente = $pariente;
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
        // $id_parentescos = $request->input('id_parentescos'); 
        // $nombre = $request->input('nombre'); 
        // $telefono = $request->input('telefono'); 

        // $data = array(
        //     array('id_parentescos'=>$id_parentescos, 'nombre'=>$nombre, 'telefono'=>$telefono)    
        // );

        // Pariente::insert($data); // Eloquent

        // $pariente->fill([
        //     'id_parentescos' => 1,
        //     'nombre' => \Input::get('nombreMadre'),
        //     'telefono' => \Input::get('telefonoMadre')
        // ]); 
        $estudiante = Estudiante::create($request->all());
        // Estudiante::create($request->all());

        // $pariente->save($pariente);
        $pariente = Pariente::create($request->all());
        // Pariente::create($request->all());

        // Banda_estudiante::create($request->all());

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
