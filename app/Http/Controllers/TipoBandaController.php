<?php

namespace CBA\Http\Controllers;

use Illuminate\Http\Request;

use CBA\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use CBA\TipoBAnda;

class TipoBandaController extends Controller
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
        $tipoBanda = TipoBanda::All();        
        return view('tipoBanda.index', compact('tipoBanda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoBanda.create');
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

        TipoBanda::create($request->all());

        return redirect('/tipoBanda')->with('message','Tipo de banda registrada correctamente');
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
        $tipoBanda = TipoBanda::findOrFail($id);
        $this->notFound($tipoBanda);
        return view('tipoBanda.edit', ['tipoBanda'=>$tipoBanda]);
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

        $tipoBanda = TipoBanda::findOrFail($id);
        $this->notFound($tipoBanda);
        $tipoBanda->fill($request->all());
        $tipoBanda->save();

        Session::flash('message', 'Tipo de banda modificada correctamente');
        return Redirect::to('/tipoBanda');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoBanda = TipoBanda::find($id);
        $this->notFound($tipoBanda);
        $tipoBanda->delete();
        Session::flash('message', 'Tipo de banda eliminada correctamente');
        return Redirect::to('/tipoBanda');
    }
}
