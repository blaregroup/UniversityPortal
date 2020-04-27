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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function Index(){
    // check if user account is active or not
    if(!Auth::user()->getactive()){

        // if account is not active
        return view('HomePage', ['message'=> 'Your account is not active. ask admin for Permission!' ]);
    }else{

        return view('HomePage');
        }   
    }

}
