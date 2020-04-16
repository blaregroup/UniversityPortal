<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class admin extends Controller
{

    // administrator index page
    public function index(){

    	// Admin Name
    	$user = Auth::user();

    	return view('administrator');
    }

    // permission view
    public function permission(){
    	return view('grantpermission');
    }
}
