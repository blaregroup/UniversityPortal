<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Notice;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function Index(Request $request){
    /*
        +"id": "1",
         +"message": "This Is Text Two Notification",
         +"user_id": "1",
         +"created_at": "2020-04-30 16:30:48",
         +"updated_at": "2020-04-30 16:30:48",
         +"name": "Administrator",
         +"email": "admin@nothing.com",
    */
        //dd();
    $notice = DB::table('notices')->select('notices.id','notices.message','notices.created_at','users.name','users.email','notices.title')->join('users', 'users.id', 'notices.user_id')->get();
    $role = $request->user()->role()->first()->access; 

    if ($role==='high') {
        return redirect('/admin');

    }
    else if($role==='low' && Auth::user()->getactive()){
        //if student is active then return student home page
        return redirect('/student');
    }
   
   
    // check if user account is active or not
    if(!Auth::user()->getactive()){

        // if account is not active
        return view('HomePage', ['error'=> 'Your account is not active. ask admin for Permission!',
            'notices'=>$notice ]);
    }else{

        return view('HomePage',[
            'notices'=>$notice]);
        }

    }

    public function Notice(Request $request){

        /*

         {#3082
         +"id": "1",
         +"email": "admin@nothing.com",
         +"name": "Administrator",
         +"message": "This Is Text Two Notification",
         +"user_id": "1",
         +"title":"title";
         +"created_at": "2020-05-01 08:42:13",
       },

        */
        
        if(!Auth::user()->getactive()){
            // if account is not active
            return redirect('/home');
        }
            
        $notice = DB::table('notices')
        ->select('notices.id',
            'users.email',
            'users.name', 
            'notices.message',
            'notices.user_id', 
            'notices.title',
            'notices.created_at')
        ->join(
            'users', 
            'users.id', 
            'notices.user_id')
        ->get();

        $notices = Notice::where('user_id', $request->user()->id)->get();


        return view('NoticeBoard', ['notices'=>$notice, 
            'mynotice'=>$notices
        ]);
        
    }


    public function NoticeCreate(Request $request){
        if(!Auth::user()->getactive()){
            // if account is not active
            return redirect('/home');
        }
        $request->user()->createNotification(
            $request->input("title"),
            $request->input("message")
        );
        return redirect('/notice');
    }

    public function NoticeDelete(Request $request){
        if(!Auth::user()->getactive()){
            // if account is not active
            return redirect('/home');
        }
        $noticeid = $request->input('id');
        if ($noticeid) {
            $notice = $request->user()->notice()->find($noticeid);
            if ($notice) {
                $notice->delete();
                # code...
            }
            # code...
        }
    
        return redirect('/notice');
    }


}
