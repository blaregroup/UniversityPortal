<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Hash;
use App\User;
use Illuminate\Http\Request;



class AdminHandler extends Controller
{

    // Admin Dash Board
    public function Index(){
    	return view('admin.AdminPanel');
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
        DB::table('users')
            ->where('id', $request->id)
            ->update($request->except('_token', 'password','id'));

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

			foreach ($request->except('_token') as $key => $value) {
			     DB::table('roles')->where('id', $key)->update(['active'=>$n]); // user activated	
			}		
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
}
