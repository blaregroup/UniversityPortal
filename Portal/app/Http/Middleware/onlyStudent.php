<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class onlyStudent
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
        // check if user is authenticated or not
        if(Auth::check()){
            // if user is a admin
            if(Auth::user()->getaccess()==="low"){

                // allow admin
                return $next($request);
            }
        }   
        return redirect('login');
    }
}
