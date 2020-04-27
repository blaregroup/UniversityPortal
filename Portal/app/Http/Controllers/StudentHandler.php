<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentHandler extends Controller
{
    /*
    *
    */
    // index
   	public function index(){
   		return 'StudentIndex';
   	}

   	// personal
   	public function syllabus(){
   		return 'Syllabus';
   	}

   	// personal update
   	public function notification(){
   		return 'Notification';
   	}


   	// public
   	public function material(){
   		return 'Material';
   	}
}
