<?php

namespace CBA\Http\Controllers;

use Illuminate\Http\Request;

use CBA\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use CBA\Institucion;
use CBA\Municipio;


class InstitucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institucion = Institucion::with('municipios')->get(); //with() para traer el modelo Municipios
        
        return view('institucion.index', compact('institucion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $municipio = \DB::table('municipios')->lists('nombre', 'id_municipios');
        
        return view('institucion.create', compact('municipio'));
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
            'nombre' => 'required|max:255',
            'id_municipios' => 'required',           
            'resenha' => 'required|max:255',                                
        ]);

        Institucion::create($request->all());

        return redirect('/institucion')->with('message','Institución registrada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
  //       $institucion = Institucion::find($id);    
  // return view('institucion.show')->with('institucion', $institucion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $institucion = Institucion::findOrFail($id);
        $municipios = Municipio::lists('nombre','id_municipios');
        
        return view('institucion.edit', compact('institucion', 'municipios'));
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
            'nombre' => 'required|max:255', 
            'resenha' => 'required|max:255',           
        ]);

        $institucion = Institucion::findOrFail($id);
        $institucion->fill($request->all());
        $institucion->save();

        Session::flash('message', 'Institución modificada correctamente');
        return Redirect::to('/institucion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $institucion = Institucion::find($id);
        $institucion->delete();
        Session::flash('message', 'Institución eliminada correctamente');
        return Redirect::to('/institucion');
    }
}
