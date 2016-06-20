<?php

namespace CBA\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
use Session;

class Admin
{
    protected $auth;

    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( Auth::check() && Auth::user()->is_admin == 1 )
        {

            return $next($request);

        }else{

            Session::flash('message', 'No es admin');
            return redirect()->to('home');

        }

        // if ( Auth::check() && Auth::user()->isAdmin() )
        // {

        //     return $next($request);

        // }else{

        //     return redirect ('/');

        // }

        // if ($this->auth->user()->is_admin != 1) {
        //     Session::flash('message', 'No es admin');
        //     return redirect()->to('home');
        // } else {
        //     return $next($request);
        // }

        // return $next($request);
        
    }
}
