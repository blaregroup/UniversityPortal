<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class onlyAdmin
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

            // if user had High Access Permission
            if(Auth::user()->getaccess()==="high"){

                // allow admin
                return $next($request);
            }
        }   
        return redirect('login');
        
        
    }
    
}
