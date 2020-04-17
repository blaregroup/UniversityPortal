<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class onlyTeacher
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

            // if user is a Teacher
            if (($user->role==='T')&&($user->active==='Y')){

                // allow student
                return $next($request);
            }
            

        }   
        return redirect('login');
    }
}
