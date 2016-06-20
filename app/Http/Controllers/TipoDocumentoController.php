<?php

namespace CBA\Http\Controllers;

use Illuminate\Http\Request;
use CBA\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use CBA\TipoDocumento;

class TipoDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoDocumento = TipoDocumento::All();        
        return view('tipoDocumento.index', compact('tipoDocumento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoDocumento.create');
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
        ]);

        TipoDocumento::create($request->all());

        return redirect('/tipoDocumento')->with('message','Tipo de documento registrado correctamente');
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
        $tipoDocumento = TipoDocumento::findOrFail($id);
        return view('tipoDocumento.edit', ['tipoDocumento'=>$tipoDocumento]);
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
        ]);

        $tipoDocumento = TipoDocumento::findOrFail($id);
        $tipoDocumento->fill($request->all());
        $tipoDocumento->save();

        Session::flash('message', 'Tipo de documento modificado correctamente');
        return Redirect::to('/tipoDocumento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoDocumento = TipoDocumento::find($id);
        $tipoDocumento->delete();
        Session::flash('message', 'Tipo de documento eliminado correctamente');
        return Redirect::to('/tipoDocumento');
    }
}
