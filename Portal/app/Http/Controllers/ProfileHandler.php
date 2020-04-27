<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use DB;
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
        Show Anyone Common Profile Information    
    */
    public function index($id){
        
        // check if $id exists in profile table
        if(DB::table('profiles')->where('id',$id)->exists()){
            $info = DB::table('profiles')->where('id', $id)->first();

            //return 'Profile Name : '.$info->fname.' | Description : '.$info->description;
            return view('profile.profile', ['info'=>$info
            ]);
        }
        else{

            return 'Profile Page Not Found';    
        }
        
    }

    // redirect to my profile
    public function mine_profile(){
        return redirect('/profile/'.Auth::user()->id.'/personal/');
    }

    /**
     * 
     * 
     */

    public function personal($id){
        // check if user is account holder or not
        if (Auth::user()->id==$id) {
   
            // check if $id exists in profile table
            if(DB::table('profiles')->where('id',$id)->exists()){
                $info = DB::table('profiles')->where('id', $id)->first();
                return view('profile.personal', ['info'=>$info]);
            }
            else{

                return 'Profile Page Not Generated Yet';    
            }
        }
        else{
            return "You are not account holder to View Personal Details";
        }

    }

    // update information
    public function personal_update($id){

     // check if user is account holder or not
    if (Auth::user()->id==$id) {
   
            // check if $id exists in profile table
            if(DB::table('profiles')->where('id',$id)->exists()){
                $info = DB::table('profiles')->where('id', $id)->first();
                return view('profile.edit', ['info'=>$info]);
            }
            else{

                return 'Profile Page Not Generated Yet';    
            }
        }
        else{
            return "You are not account holder to View Personal Details";
        }


    }

    public function save_changes(Request $request, $id){
        if (Auth::user()->id==$id) {
            $value = $request->except('_token');
            //dd($value);
            DB::table('profiles')->where('id', $id)->update($value);
            
        }
        
        return redirect('/profile/'.Auth::user()->id.'/personal/edit');
    }
}
