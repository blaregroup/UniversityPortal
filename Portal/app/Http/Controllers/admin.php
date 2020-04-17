<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Illuminate\Http\Request;

class admin extends Controller
{

    // administrator index page
    public function index(){

    	// Admin Name
    	$user = Auth::user();

    	return view('administrator');
    }


    public function activate(Request $request){
    	// if user is authorized
    	if ($request->user()) {
    		// if request is from admin
    		if ($request->user()->role==='A') {
    			foreach ($request->all() as $key => $value) {
    				if ($key!=='_token') { // except token field
    									// making user active
 						   				$tmp = DB::table('users')->where('id', $key)->update(['active'=>'Y']); // user activated
    				}
    			}		
    		}
    	}
    	return redirect('/admin/perm');
    	
    	
    }

    public function deactivate(Request $request){
    	// if user is authorized
    	if($request->user()){

    		// if request is from admin
    		if($request->user()->role==='A'){
    			foreach ($request->all() as $key => $value) {
    			if ($key!=='_token') { // except token field
    									// making user active
 						   				$tmp = DB::table('users')->where('id', $key)->update(['active'=>'N']); // users deactivate
    				}
    			}

    		}
    	}
    	return redirect('/admin/perm');
    }


    // permission view
    public function permission(){

    	$noactive = DB::table('users')->where('active', 'N')->get();
    	$activeuser = DB::table('users')->where('active', 'Y')->where('id','!=', '1')->get();
    	return view('grantpermission',['active'=>$activeuser ,'noactive'=>$noactive]);
    }
}
