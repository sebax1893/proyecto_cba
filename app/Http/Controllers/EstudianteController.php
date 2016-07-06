<?php

namespace CBA\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use CBA\Http\Requests;
use CBA\Estudiante;
use CBA\Banda_estudiante;
use CBA\Pariente;
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

        $this->validate($request, [
            'id_tipo_documentos' => 'required',
            'id_eps' => 'required',
            'id_municipios' => 'required',            
            'nombres' => 'required|string',
        ]);

        // $id_parentescos = $request->input('id_parentescos'); 
        // $nombre = $request->input('nombre'); 
        // $telefono = $request->input('telefono'); 

        // $data = array(
        //     array('id_parentescos'=>$request->input('id_parentescos'), 'nombre'=>$request->input('nombre'), 'telefono'=>$request->input('telefono'))    
        // );

        $posts = $request->all();

        // Pariente::insert($data); // Eloquent

        // $pariente->fill([
        //     'id_parentescos' => 1,
        //     'nombre' => \Input::get('nombreMadre'),
        //     'telefono' => \Input::get('telefonoMadre')
        // ]); 

        // Convert your objects to arrays. You can use array_walk instead,
        // if you prefer to just modify the original $data
        // $arrayData = array_map(function($value) {
        //     return (array) $value;
        // }, $data);

        // $this->pariente->id_parentescos = $request->input('id_parentescos');
        // $this->pariente->nombre = $request->input('nombre');
        // $this->pariente->telefono = $request->input('contacto');
        // $this->pariente->save();
        // $this->pariente->id_parentescos = implode(',', $posts['id_parentescos']);
        // $this->pariente->nombre = implode(',', $posts['nombre']);
        // $this->pariente->telefono = implode(',', $posts['contacto']);
        // $this->pariente->save();
        // $data = array(
        //     'id_parentescos' => $posts['id_parentescos'],
        //     'nombre' => $posts['nombre'],
        //     'telefono' => $posts['contacto'],
        // );

        $ids = $request->input('parientes.*.id_parentescos');
        $nombres = $request->input('parientes.*.nombre');
        $telefono = $request->input('parientes.*.contacto');

        $data = array(
            'id_parentescos' => $ids,
            'nombre' => $nombre,
            'telefono' => $telefono,
        );

        var_dump($data);
        // var_dump(serialize($data));
        // $this->pariente->id_parentescos = $posts['id_parentescos'];
        // $this->pariente->nombre = $posts['nombre'];
        // $this->pariente->telefono = $posts['contacto'];
        $this->pariente->save($data);

        // $pariente = Pariente::saveMany($request->all());

        // do the insert
        // $success = Pariente::insert($data);
        $estudiante = Estudiante::create($request->all());

        // view last query run (to confirm one bulk insert statement)
        $log = DB::getQueryLog();
        print_r(end($log));

        // Estudiante::create($request->all());


        // $pariente = Pariente::create($request->all());

        // $this->pariente->nombre = $request->input('nombre');
        // $this->pariente->telefono = $request->input('contacto');
        // $this->pariente->save();
        // $nombreArray = $request->input('nombre');
        // $nombre = implode(",", $nombreArray);
        // $telefonoArray = $request->input('contacto');
        // $telefono = implode(",", $telefonoArray);
        // $this->pariente->nombre = $nombre;
        // $this->pariente->telefono = $telefono;
        // $this->pariente->id_parentescos = $request->input('id_parentescos');        
        // $this->pariente->save();

    //     $pariente = $this->pariente->create([
    //     'nombre' => $request->get('nombre'),
    //     'telefono' => $request->get('telefono'),
    //     'id_parentescos' => $request->get('id_parentescos')
    // ]);

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
