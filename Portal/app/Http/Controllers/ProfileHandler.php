<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use DB;
use App\User;
use App\Profile;


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

        $profile = Profile::where('user_id', $id)->first();
        

        // check profile exists
        if($profile){
            return view('profile.ProfilePage', ['info'=>$profile
            ]);
        }
        else{

            return 'Profile Page Not Found';    
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

        // Get user profile object from profile table through foreign key of user object
        $profile = $request->user()->Profile()->first();


        if($profile){

            return view('profile.DetailProfile', ['info'=>$profile]);
        
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
        $profile = $request->user()->Profile()->first();
   
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
