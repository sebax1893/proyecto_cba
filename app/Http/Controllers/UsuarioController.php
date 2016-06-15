<?php

namespace CBA\Http\Controllers;

use Illuminate\Http\Request;

use CBA\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use CBA\User;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::All();
        return view('usuario.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.create');
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'is_admin' => 'required|in:0,1',
        ]);

        
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
            'is_admin' => $request['is_admin'],
        ]);

        return redirect('/usuario')->with('message','Usuario registrado correctamente');
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
        $user = User::findOrFail($id);
        return view('usuario.edit', ['user'=>$user]);
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

        // $this->validate($request, [
        //     'name' => 'required|max:255',
        //     // 'email' => 'required|email|unique:users,email,'.$id,
        //     'email'=>'required|email|unique:users,email,'->where('id_users', $id),
        //     // 'password' => 'required|min:6|confirmed',
        //     'is_admin' => 'required|in:0,1',
        // ]);

        $rules = User::$rules;
$rules['email'] = $rules['email'] . ',id_users,' . $id;
$validationCertificate  = Validator::make($input, $rules);

        $user = User::findOrFail($id);
        $user->fill($request->all());
        $user->save();

        Session::flash('message', 'Usuario modificado correctamente');
        return Redirect::to('/usuario');

        // Session::flash('message');

        // return redirect('/usuario')->with('message','store2');
        // return Redirect::route('user.index')
        //         ->with('message', 'User updated.');

        // return view('usuario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        Session::flash('message', 'Usuario eliminado correctamente');
        return Redirect::to('/usuario');
    }
}
