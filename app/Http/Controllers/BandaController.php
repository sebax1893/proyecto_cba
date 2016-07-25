<?php

namespace CBA\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use CBA\Http\Requests;
use CBA\Banda;
use CBA\Institucion;
use CBA\Categoria;
use CBA\TipoBanda;

class BandaController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banda = Banda::All(); //->with() para traer otros modelos... no necesario acá, tambien sirve ->All() 
        return view('banda.index', compact('banda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $institucion = \DB::table('institucions')->lists('nombre', 'id_institucions');
        $categoria = \DB::table('categorias')->lists('nombre', 'id_categorias');
        $tipoBanda = \DB::table('tipo_bandas')->lists('nombre', 'id_tipo_bandas');
        
        return view('banda.create', compact('institucion', 'categoria', 'tipoBanda'));
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
            'id_institucions' => 'required',                                               
            'id_categorias' => 'required',
            'id_tipo_bandas' => 'required',
            'nombre' => 'required|max:255',
            'representante' => 'required|max:255',
            'contacto_representante' => 'required|numeric',
            'correo_representante' => 'required|email|max:255',
            'director' => 'required|max:255',
            'contacto_director' => 'required|numeric',
            'correo_director' => 'required|email|max:255', 
            'nombre' => 'required|max:255',
            'resenha' => 'required',

        ]);

        Banda::create($request->all());

        return redirect('/banda')->with('message','Banda registrada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banda = Banda::findOrFail($id); 
        $this->notFound($banda);
        $institucion = Institucion::lists('nombre', 'id_institucions');
        $categoria = Categoria::lists('nombre', 'id_categorias');
        $tipoBanda = TipoBanda::lists('nombre', 'id_tipo_bandas');
        
        return view('banda.edit', compact('banda', 'institucion', 'categoria', 'tipoBanda'));        
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
            'id_institucions' => 'required',                                               
            'id_categorias' => 'required',
            'id_tipo_bandas' => 'required',
            'nombre' => 'required|max:255',
            'representante' => 'required|max:255',
            'contacto_representante' => 'required|numeric',
            'correo_representante' => 'required|email|max:255',
            'director' => 'required|max:255',
            'contacto_director' => 'required|numeric',
            'correo_director' => 'required|email|max:255', 
            'nombre' => 'required|max:255',
            'resenha' => 'required',                
        ]);

        $banda = Banda::findOrFail($id);
        $this->notFound($banda);
        $banda->fill($request->all());
        $banda->save();

        Session::flash('message', 'Banda modificada correctamente');
        return Redirect::to('/banda');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banda = Banda::find($id);
        $this->notFound($banda);
        $banda->delete();
        Session::flash('message', 'Banda eliminada correctamente');
        return Redirect::to('/banda');
    }
}
