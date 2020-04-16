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

            // get user object
            $user = Auth::user();

            // if user is a admin
            if($user->role==='A'){

                // allow admin
                return $next($request);
            }

        }   
        return redirect('login');
        
        
    }
    
}
