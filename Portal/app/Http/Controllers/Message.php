<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Message extends Controller
{
    //

    public function Index(Request $request){
    	return view('Message');

    }

    public function Send(Request $request){
    	
    }
}
