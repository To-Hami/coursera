<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class admin
{
    public function handle($request, Closure $next)
    {

        if(auth()->guest()){
            return redirect('/login');
        }


        if(auth()->user()->group != 'admin'){
            return redirect('/');
        }


        return $next($request);
    }
}
