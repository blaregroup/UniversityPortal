<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Hash;
use Illuminate\Http\Request;

class admin extends Controller
{

    // administrator index page
    public function index(){
    	return view('admin.administrator');
    }





    /*

    To handle Login Settings
    
    */
    public function user($id='1'){
        $info = DB::table('users')->where('id', $id)->get()->first();
        $user = DB::table('users')->select('id', 'name', 'email')->get();
        return view('admin.user', ['info'=>$info, 'user'=>$user]);
    }




    /* 

    add user

    */
    public function add(Request $request){

        $value = $request->except('_token');
        DB::table('users')->insert($value);

        return redirect("admin/add");
    }

    // edit user information
    public function edit(Request $request){
        DB::table('users')->where('id', $request->id)->update($request->except('_token', 'password','id'));

        if($request->password!=null){
            DB::table('users')->where('id', $request->id)->update(['password' => Hash::make($request->password)]);
        }
        return redirect('admin/add/'.$request->id);
    
    }

    // get activate
    public function activate(Request $request){
    	// if request is from admin
		if ($request->user()->role==='A') {
			foreach ($request->except('_token') as $key => $value) {
			DB::table('users')->where('id', $key)->update(['active'=>'Y']); // user activated	
			}		
		}
    	return redirect('/admin/perm');    	
    }


    public function deactivate(Request $request){
		// if request is from admin
		if($request->user()->role==='A'){
            foreach ($request->except('_token') as $key => $value) {
			DB::table('users')->where('id', $key)->update(['active'=>'N']); // users deactivate
			}
		}
    	return redirect('/admin/perm');
    }


    // permission view
    public function permission(){

    	$noactive = DB::table('users')->where('active', 'N')->get();
    	$activeuser = DB::table('users')->where('active', 'Y')->where('id','!=', '1')->get();
    	return view('admin.perm',['active'=>$activeuser ,'noactive'=>$noactive]);
    }
}
