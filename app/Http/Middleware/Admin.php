<?php

namespace CBA\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
        // if ( Auth::check() && Auth::user()->isAdmin() )
        // {

        //     return $next($request);

        // }else{

        //     return redirect ('/');

        // }
    }
}
