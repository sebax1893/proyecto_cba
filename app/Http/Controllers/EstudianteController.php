<?php

namespace CBA\Http\Controllers;

use Illuminate\Http\Request;

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
        // $this->validate($request->all(), [
        //     'nombres' => 'required|string',
        //     // 'parientes.*.nombre' => 'required|string',
        //     'parientes.*.telefono' => 'required',
        // ]);

        $this->validate($request, [
            'id_tipo_documentos' => 'required',
            'id_eps' => 'required',
            'id_municipios' => 'required',            
            'nombres' => 'required|string',
            // 'parientes.*.nombre' => 'required|string',
            'parientes.*.nombre' => 'required',            
            'parientes.*.telefono' => 'required',
        ]);
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

        // $pariente = Pariente::create($request->all());

        // $this->pariente->nombre = $request->input('nombre');
        // $this->pariente->telefono = $request->input('contacto');
        // $this->pariente->save();
        $nombreArray = $request->input('nombre');
        $nombre = implode(",", $nombreArray);
        $telefonoArray = $request->input('contacto');
        $telefono = implode(",", $telefonoArray);
        $this->pariente->nombre = $nombre;
        $this->pariente->telefono = $telefono;
        $this->pariente->id_parentescos = $request->input('id_parentescos');        
        $this->pariente->save();

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
