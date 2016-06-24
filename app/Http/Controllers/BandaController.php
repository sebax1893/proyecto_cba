<?php

namespace CBA\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use CBA\Http\Requests;
use CBA\Banda;
use CBA\

class BandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banda = Banda::with('municipios')->get(); //with() para traer el modelo Municipios
        $municipios = Municipio::with('subregions')->get();
        
        return view('banda.index', compact('banda', 'municipios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $municipio = \DB::table('municipios')->lists('nombre', 'id_municipios');
        
        return view('banda.create', compact('municipio'));
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
        ]);

        Banda::create($request->all());

        return redirect('/banda')->with('message','banda registrada correctamente');
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
        $municipio = Municipio::lists('nombre', 'id_municipios');
        
        return view('banda.edit', compact('banda', 'municipio'));        
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
        ]);

        $banda = Banda::findOrFail($id);
        $banda->fill($request->all());
        $banda->save();

        Session::flash('message', 'banda modificada correctamente');
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
        $banda->delete();
        Session::flash('message', 'banda eliminada correctamente');
        return Redirect::to('/banda');
    }
}
