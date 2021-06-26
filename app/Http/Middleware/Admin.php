<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()){
            if (Auth::user()->is_admin == 1){
                return $next($request);
            }
            else{
                return redirect('/user/home')->with('Notadmin','You have to be an admin to access this.');
            }
        }
        else{
            return redirect('/login');
        }
    }
}
