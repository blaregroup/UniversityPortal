<?php

namespace App\Http\Controllers;
use DB;
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

    public function AccountUpdate(Request $request){

    if ($request->method()==='GET') {
      return view('teacher.AccountHandler', ['info'=>$request->user()]);
      # code...
    }


    // update user details into users table.. Except Password.. Password remain same
        $value = $request->except('_token');
        DB::table('users')
            ->where('id', $request->user()->id)
            ->update([
            'name' => $value['name'],
            'email' => $value['email'],
            ]);

        if($request->password!=null){
            // update user details into users table Including new password
            DB::table('users')
                ->where('id', $request->user()->id)
                ->update(['password' => Hash::make($request->password)]);
        
        }
        return redirect('student/account');

  }
}
