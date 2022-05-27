<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Patientmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(session('PloggedIn'))
        {
            return redirect('/home')->with('alert', '* You must login as a clinic to enter this page *');
        }
        else
        {
            return $next($request);
        }
        
    }
}
