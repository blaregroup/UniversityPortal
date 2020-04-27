<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherHandler extends Controller
{
    //
	public function index(){
		return 'Teacher Index';
	}

	public function syllabus(){
		return 'Teacher Syllabus Controls';
	}

	public function notification(){
		return 'Teacher Notification Controls';
	}
	public function material(){
		return 'Teacher Material Controls';
	}

}
