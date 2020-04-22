<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()

    {
        // check if user is authenticated or not
        if(Auth::check()){

            // get user object
            $user = Auth::user();

            // if user is a Teacher
            if ($user->active!=='Y'){

                // allow student
            return view('student.student', ['message'=> 'Your account is not active. ask admin for Permission!' ]);

            }
            

        }   
        return view('home');
    }

}
