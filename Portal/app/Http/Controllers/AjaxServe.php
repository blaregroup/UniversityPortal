<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class AjaxServe extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');

    }

    // https://www.w3schools.com/xml/ajax_xmlhttprequest_create.asp
    public function DataRequest(Request $request)
    {


    	return json_encode($request->input());
    }

    public function userProfile(Request $request){
        $profile = DB::table('users')->select('*')->join('profiles','profiles.user_id','users.id')->join('roles','roles.user_id','users.id')->where('users.id',
            $request->input('id'))->first();

        return view('ajax.userProfile',['info'=>$profile]);
    }

    // 
    public function userConfig(Request $request){
        $info = DB::table('users')
            ->join('roles','users.id','roles.user_id')
            ->where('users.id', $request->input('id'))
            ->first();

        return view('ajax.UserConfig',['info'=>$info]);
    }


    public function createNotice(Request $request){

    	if($request->user()->getactive()){
            // if account is not active
        
        $tmp = $request->user()->createNotification(
            $request->input("title"),
            $request->input("message")
        );

        }
    	return json_encode($tmp);

    }

    public function courseList(){
        $courses = DB::table('courses')->select('id','name')->get();
        return view('ajax.CourseList',['courses'=>$courses]);
    }

    public function subjectList(){
        $subject = DB::table('subjects')->select('id','subcode','name')->get();
        return view('ajax.SubjectList',['subjects'=>$subject]);
    }


    public function courseDelete($id){

        DB::table('courses')->where('id',$id)->delete();
        return 'done';
    }

    public function subjectDelete($id){
        DB::table('subjects')->where('id',$id)->delete();
        return 'done';
    }


}
