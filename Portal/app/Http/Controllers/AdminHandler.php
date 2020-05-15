<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Hash;
use App\User;
use App\Course;
use App\Subject;
use Illuminate\Http\Request;



class AdminHandler extends Controller
{

    // Admin Dash Board
    public function Index(){
    	return view('admin.AdminPanel');
    }


     /* Manage Users*/
     public function ManageUser(){
        
        $users = DB::table('users')->select('users.name','users.email','roles.access','users.id','roles.role','roles.active')->join('roles','users.id','roles.user_id')->get();
        $profile = DB::table('users')->select('*')->join('profiles','profiles.user_id','users.id')->join('roles','roles.user_id','users.id')->where('users.id','1')->first();

        

        return view('admin.ManageUser',['users'=>$users , 'info'=>$profile]);
     }
     public function SaveChange(Request $request){
        
        $value = $request->except('_token');
        DB::table('users')
            ->where('id','1')
            ->update([
            'name' => $value['name'],
            'email'=>$value['email'],

            ]);

        DB::table('roles')
            ->where('user_id', '1')
            ->update([
                'role'=>$value['role'],
                'access'=>$value['access'],
                'active'=>$value['active']
            ]);

        DB::table('profiles')
            ->where('user_id','1')
            ->update([
                'fname'=>$value['name'],
                'description'=>$value['description'],
                'gender'=>$value['gender'],
                'dob'=>$value['dob'],
                'mothername'=>$value['mothername'],
                'fathername'=>$value['fathername'],
                'phone'=>$value['phone'],
                'mphone'=>$value['mphone'],
                'fphone'=>$value['fphone'],
                'alphone'=>$value['alphone']
            ]);        

        if($request->password!=null){
            // update user details into users table Including new password
            DB::table('users')
                ->where('id', $request->id)
                ->update(['password' => Hash::make($request->password)]);
        }
        return redirect('admin/manageuser');
    }

    /*

    This Function Retreive All User Detail and Present 
    All Information 

    @param $id Integer -> Users Table ID    
    
    */
    public function AllUser($id='1'){

        // request user complete information from table users and roles
        $info = DB::table('users')
            ->join('roles','users.id','roles.user_id')
            ->where('users.id', $id)
            ->first();

        // other users details from users table
        $user = DB::table('users')
            ->select('id', 'name', 'email')
            ->get();
        /*

         +"id": "1",
         +"name": "Administrator",
         +"email": "admin@nothing.com",
         +"email_verified_at": null,
         +"password": "$2y$10$PiIC.o38JaXH0VFuwkY9TO/9Ld7bMmcBu54N9AK/guKcsISVQscWm",
         +"remember_token": null,
         +"created_at": "2020-04-30 16:30:48",
         +"updated_at": "2020-04-30 16:30:48",
         +"role": "admin",
         +"access": "high",
         +"active": "1",
         +"user_id": "1",
         +"course_id": null,
         +"subject_id": null,

        */

        return view('admin.UserAccountPanel', ['info'=>$info, 'user'=>$user]);
    }




    /* 
    
    To add New User

    */
    public function AddUser(Request $request){

        $value = $request->except('_token');
        //dd($value);

        // create new user account
        $user = User::create([
            'name' => $value['name'],
            'email' => $value['email'],
            'password' => Hash::make($value['password'])
        ]);

        // create role 
        $user->createRole($role=$value['role'], 
                    $access=$value['access'], 
                    $active=$value['active']);
        
        return redirect("admin/add");
    }

    // edit user information
    public function Edit(Request $request){
        //dd($request);

        // update user details into users table.. Except Password.. Password remain same
        $value = $request->except('_token');
        DB::table('users')
            ->where('id', $request->id)
            ->update([
            'name' => $value['name'],
            'email' => $value['email'],
            ]);

        DB::table('roles')
            ->where('user_id', $request->id)
            ->update([
                'role'=>$value['role'],
                'access'=>$value['access'],
                'active'=>$value['active']
            ]);

        if($request->password!=null){
            // update user details into users table Including new password
            DB::table('users')
                ->where('id', $request->id)
                ->update(['password' => Hash::make($request->password)]);
        }
        return redirect('admin/add/'.$request->id);
    
    }

    // activate user active value
    public function Grant(Request $request, $n='1'){

    	// Check if user had admin permission
		if ($request->user()->getaccess()==='high') {
		
		     DB::table('roles')->where('id', $request->input('userid'))
             ->update(['active'=>$n]); // user activated	
		}
    	return redirect('/admin/perm');
    }

    // deactivate user active value
    public function rGrant(Request $request){
		return $this->Grant($request, $n='0');
    }


    // provide permission
    public function permission(){


        /*
        Sample Output

        +"id": "3",
       +"name": "Teacher",
       +"email": "teacher@nothing.com",
       +"email_verified_at": null,
       +"password": "$2y$10$2Ohm7suvfpdqwGfae0pANO0evR8Re37l2Qat8YfETg8LgFw0XHAgS",
       +"remember_token": null,
       +"created_at": "2020-04-27 11:24:55",
       +"updated_at": "2020-04-27 11:24:55",
       +"role": "teacher",
       +"access": "median",
       +"active": "0",
       +"user_id": "3",
        */


        $noactive = DB::table('users')
            ->select('*')
            ->join('roles','roles.user_id','users.id')
            ->where('active','0')
            ->where('users.id','!=','1')
            ->get();

        $active = DB::table('users')
            ->select('*')
            ->join('roles', 'roles.user_id', 'users.id')
            ->where('active','1')
            ->where('users.id','!=','1')
            ->get();
        return view('admin.UserPermission',['active'=>$active ,'noactive'=>$noactive]);
    }


    /*

            >>> Course::find('1')->subject()->get()
        => Illuminate\Database\Eloquent\Collection {#3078
             all: [
               App\Subject {#3082
                 id: "1",
                 subcode: "MCA1",
                 name: "MCA_SUB1",
                 description: "MCA_SUB_DESCRIPTION",
                 course_id: "1",
                 created_at: "2020-04-30 11:11:35",
                 updated_at: "2020-04-30 11:11:35",
               },
               App\Subject {#3083
                 id: "2",
                 subcode: "MCA2",
                 name: "MCA_SUB2",
                 description: "MCA_SUB_DESCRIPTION",
                 course_id: "1",
                 created_at: "2020-04-30 11:11:35",
                 updated_at: "2020-04-30 11:11:35",
               },
               App\Subject {#3084
                 id: "3",
                 subcode: "MCA3",
                 name: "MCA_SUB3",
                 description: "MCA_SUB_DESCRIPTION",
                 course_id: "1",
                 created_at: "2020-04-30 11:11:35",
                 updated_at: "2020-04-30 11:11:35",
               },
             ],
           }
        >>> Course::find('1')
        => App\Course {#3081
             id: "1",
             name: "MCA",
             Description: "MCA",
             created_at: "2020-04-30 11:11:35",
             updated_at: "2020-04-30 11:11:35",
           }

*/
    // Course 
    public function Course(Request $request){

        $cmd=$request->input('cmd');
        if ($cmd) {
            if ($cmd==='addcourse' 
                && $request->input('course') 
                && $request->input('description') ) {

                Course::create([
                    'name'=>$request->input('course'),
                    'Description'=>$request->input('description')
                ]);
            
            }elseif ($cmd==='addsubject' 
                && $request->input('subcode')
                && $request->input('name')
                && $request->input('description') ) {

                Subject::create([
                    'subcode'=>$request->input('subcode'),
                    'name'=>$request->input('name'),
                    'description'=>$request->input('description')
                ]);

                # code...
            }elseif($cmd==='addsubject'
                && $request->input('subcode')
                && $request->input('course_id')){
                //dd($request->input());
                Subject::find($request->input('subcode'))
                ->update(['course_id'=>$request->input('course_id')]);

            }else{

            }
        }
        $course_id = $request->input("id");

        if ($course_id) {
            $Course = Course::find($course_id);
            if ($Course) {
                $Subject=Course::find($course_id)->subject()->get();
                return view('admin.Course', ['AllCourse'=>Course::all(),
                    'Course'=>$Course,
                    'Subject'=>$Subject,
                    'AllSubject'=>Subject::all(),
                ]);            
                # code...
            }
        }        
        return view('admin.Course', ['AllCourse'=>Course::all()]);
        

    }
}
