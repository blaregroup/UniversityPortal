<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use DB;
use App\User;
use App\Profile;
use App\Subject;


class ProfileHandler extends Controller
{

    /**
     *  This Profile Controller manage User Profile
     *  Information Like if User want to see profile details
     *  want to do any changes or anything else related to
     *  user profile, can perform here easily
     * 
     *  authentication is required!! :))
     * 
     **/ 
    public function __construct(){
        /**
         * 
         *  Authentication Routine
         * 
         */
        $this->middleware('auth');
    }

    /*
        This function basically Render Profile Basica Information
        from database and generate view to present it.
        Using This, Any User can see anyone else Profile but only basic
        Informations

        @param Integer $id -> User Table ID

    */
    public function Index($id){

        $profile = DB::table('roles')
        ->select('*')
        ->join('profiles', 'profiles.user_id', 'roles.user_id')
        ->join('users', 'users.id', 'roles.user_id')
        ->where('users.id',$id)
        ->first();
        //dd($profile);
        /*        
        DB::table('roles')
        ->select('*')
        ->join('profiles', 'profiles.user_id', 'roles.user_id')
        ->join('users', 'users.id', 'roles.user_id')
        ->where('roles.user_id','1')
        ->first()
        
        => Illuminate\Support\Collection {#3078
             all: [
               {#3065
                 +"id": "1",
                 +"role": "admin",
                 +"access": "high",
                 +"active": "1",
                 +"user_id": "1",
                 +"course_id": null,
                 +"subject_id": null,
                 +"created_at": "2020-04-30 16:30:48",
                 +"updated_at": "2020-04-30 16:30:48",
                 +"fname": "new user number1",
                 +"description": "Empty",
                 +"gender": null,
                 +"dob": null,
                 +"mother_name": null,
                 +"father_name": null,
                 +"phone": null,
                 +"mphone": null,
                 +"fphone": null,
                 +"alphone": null,
                 +"name": "Administrator",
                 +"email": "admin@nothing.com",
                 +"email_verified_at": null,
                 +"password": "$2y$10$PiIC.o38JaXH0VFuwkY9TO/9Ld7bMmcBu54N9AK/guKcsISVQscWm",
                 +"remember_token": null,
               },
             ],
           }
        */
        // check profile exists
        if($profile){
            return view('profile.ProfilePage', ['info'=>$profile
            ]);
        }
        else{

            return '[-] Profile Page Not Found';    
        }
        
    }

    /*

        Redirect to User Personal Profile Section
    */
    public function MineProfile(){
        return redirect('/profile/personal/');
    }

    /**
     *  This function Render Logged In User Profile Complete Detail From Profile Table
     *  and Present It.
     */

    public function Personal(Request $request){
        $id =  $request->user()->id;
        // Get user profile object from profile table through foreign key of user object
        $profile = DB::table('roles')
        ->select('*')
        ->join('profiles', 'profiles.user_id', 'roles.user_id')
        ->join('users', 'users.id', 'roles.user_id')
        ->where('roles.user_id', $id)
        ->first();

        /*        DB::table('roles')->join('courses', 'roles.course_id','courses.id')->where('roles.user_id','2')->first()
         {#3100
         +"id": "1",
         +"role": "student",
         +"access": "low",
         +"active": "0",
         +"user_id": "2",
         +"course_id": "1",
         +"subject_id": null,
         +"created_at": "2020-04-30 16:30:49",
         +"updated_at": "2020-04-30 16:30:49",
         +"name": "MCA",
         +"Description": "MCA",

         pp\Subject {#3097
         id: "1",
         subcode: "MCA1",
         name: "MCA_SUB1",
         description: "MCA_SUB_DESCRIPTION",
         course_id: "1",
         unlink: "1",
         created_at: "2020-04-30 16:30:49",
         updated_at: "2020-04-30 16:30:49",
       }
        
        */
        if($profile){

            return view('profile.DetailProfile', ['info'=>$profile,
                'course'=>DB::table('roles')
                ->join('courses', 'roles.course_id','courses.id')
                ->where('roles.user_id', $id)
                ->first(),
                'subjects'=>Subject::where('course_id', 
                    User::find($id)
                    ->role()
                    ->first()
                    ->course_id)
                ->get()
            ]);
        
        }
        else{

            return 'Profile Page Not Generated Yet';    
        }


    }

    /*
        This Function Preset Profile Table Details of LoggedIn User
        In Editor Mode. So, that User can make changes

    */
    public function PersonalUpdate(Request $request){

        // Get user profile object from profile table through foreign key of user object
        $id =  $request->user()->id;
        // Get user profile object from profile table through foreign key of user object
        $profile = DB::table('roles')
        ->select('*')
        ->join('profiles', 'profiles.user_id', 'roles.user_id')
        ->join('users', 'users.id', 'roles.user_id')
        ->where('roles.user_id', $id)
        ->first();
   
        
        if($profile){
            return view('profile.DetailEditor', ['info'=>$profile]);
        }
        else{

            return 'I Think Profile Page Not Generated Yet';    
        }
    }

    /*
        This function receive Post Request for Profile Details Changes
        from Logged In User.

        Using This Function, User Update Its Profile Details in Profile Table
    */

    public function SaveChange(Request $request){
        
        $value = $request->except('_token');
        //dd($request->user()->id);

        DB::table('profiles')->where('user_id', $request->user()->id)->update($value);
            
        return redirect('/profile/personal/edit');
    }
}
