<?php

namespace App\Http\Controllers;

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




}
