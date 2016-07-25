<?php

namespace CBA\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use CBA\Http\Requests;
use CBA\Parentesco;

class ParentescoController extends Controller
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
        $parentesco = Parentesco::All();        
        return view('parentesco.index', compact('parentesco'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parentesco.create');
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

        Parentesco::create($request->all());

        return redirect('/parentesco')->with('message','Parentesco registrado correctamente');
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
        $parentesco = Parentesco::findOrFail($id);
        $this->notFound($parentesco);
        return view('parentesco.edit', ['parentesco'=>$parentesco]);
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

        $parentesco = Parentesco::findOrFail($id);
        $this->notFound($parentesco);
        $parentesco->fill($request->all());
        $parentesco->save();

        Session::flash('message', 'Parentesco modificado correctamente');
        return Redirect::to('/parentesco');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parentesco = Parentesco::find($id);
        $this->notFound($parentesco);
        $parentesco->delete();
        Session::flash('message', 'Parentesco eliminado correctamente');
        return Redirect::to('/parentesco');
    }
}
