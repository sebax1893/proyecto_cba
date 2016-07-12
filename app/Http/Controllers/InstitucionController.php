<?php

namespace CBA\Http\Controllers;

use Illuminate\Http\Request;

use CBA\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use CBA\Institucion;
use CBA\Municipio;
use CBA\Subregion;

class InstitucionController extends Controller
{
    
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
        $institucion = Institucion::All(); //with() para traer el modelo Municipios
        // $municipios = Municipio::with('subregions')->get();
        
        return view('institucion.index', compact('institucion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $munimuni = \DB::table('municipios')->lists('nombre', 'id_municipios');
        
        return view('institucion.create', compact('munimuni'));
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
            'direccion' => 'required|max:255',
            'telefono' => 'required|numeric',
            'id_municipios' => 'required',                                               
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
        $municipio = Municipio::lists('nombre', 'id_municipios');
        
        return view('institucion.edit', compact('institucion', 'municipio'));        
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
