<?php

namespace CBA\Http\Controllers;

use Illuminate\Http\Request;

use CBA\Http\Requests;

class BandaController extends Controller
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

        return redirect('/institucion')->with('message','Institucion registrada correctamente');
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
        // $municipios = Municipio::lists('nombre','id_municipios');
        $municipio = Municipio::lists('nombre', 'id_municipios');
        
        return view('institucion.edit', compact('institucion', 'municipio'));
        // return view('institucion.edit', ['institucion'=>$institucion], ['municipio'=>$municipio]);
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
            'id_municipios' => 'required',
            'resenha' => 'required|max:255',           
        ]);

        $institucion = Institucion::findOrFail($id);
        $institucion->fill($request->all());
        $institucion->save();

        Session::flash('message', 'Institucion modificada correctamente');
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
        Session::flash('message', 'Institucion eliminada correctamente');
        return Redirect::to('/institucion');
    }
}