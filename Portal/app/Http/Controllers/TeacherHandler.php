<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Subject;

class TeacherHandler extends Controller
{
    //
	public function Index(Request $request){

		/*

		 id: "8",
         subcode: "MSC2",
         name: "MSC_SUB2",
         description: "MSC_SUB_DESCRIPTION",
         course_id: "3",
         created_at: "2020-05-04 18:52:46",
         updated_at: "2020-05-04 18:52:46",
         pivot: Illuminate\Database\Eloquent\Relations\Pivot {#3095
           roles_id: "3",
           subject_id: "8",


		+"id": "2",
         +"name": "Student",
         +"email": "student@nothing.com",
         +"email_verified_at": null,
         +"password": "$2y$10$zMm27pUWPtvjWFcBvbcNJ.TinhpaPH1UbmlvTfPUJ7oDAat8X96Yu",
         +"remember_token": null,
         +"created_at": "2020-05-04 18:52:45",
         +"updated_at": "2020-05-04 18:52:45",
         +"role": "student",
         +"access": "low",
         +"active": "1",
         +"user_id": "2",
         +"course_id": "1",
         +"fname": "new user number2",
         +"description": "Empty",
         +"gender": null,
         +"dob": null,
         +"mother_name": null,
         +"father_name": null,
         +"phone": null,
         +"mphone": null,
         +"fphone": null,
         +"alphone": null, 

		*/
		$subjects = $request->user()->role()->first()->subject()->get();
		$subcode = $request->input('subcode');
		if ($subcode) {
			$course_id = Subject::find($subcode)->course()->first()->id;
			# code...
			$students = DB::table('users')->join('roles','users.id','roles.user_id')->join('profiles', 'profiles.user_id','users.id')->where('role','student')->where('course_id',$course_id)->get();
		}else{
			$students = false;
		}
		return view('teacher.Dashboard',['subjects'=>$subjects, 'students'=>$students]);
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
        return redirect('teacher/account');;

	}

}
