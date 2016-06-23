<?php

namespace CBA\Http\Controllers;

use Illuminate\Http\Request;

use CBA\Http\Requests;

class FrontController extends Controller
{

    public function __construct() {
        $this->middleware('auth', ['only' => 'home']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function home()
    {
        return view('home');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function reset()
    {
        return view('passwords/reset');
    }
      
}
