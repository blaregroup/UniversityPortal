<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class profile extends Controller
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
        Show Profile Information    
    */
    public function index($id){

        return 'Profile Page : '.$id;
    }

    /**
     * 
     * 
     */
    public function personal($id){
        return 'Personal Info : '.$id;
    }


    public function personal_update($id){

        return 'Update Information : '.$id;
    }
}
