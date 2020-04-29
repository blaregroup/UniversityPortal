<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DocumentController extends Controller
{
	
	public function __construct()
    {
        $this->middleware('auth');
    }



	public function UploadFile(Request $request)
	{
		if($request->method()==='POST'){
			$output = $this->Uploader($request);
			if($output){
				return view('teacher.UploadFiles', ['message'=>'Successfully Uploaded']);
			}
		}else{
			return view('teacher.UploadFiles');
		}
	}

	public function Uploader(Request $request)
	{
		
		if ($request->hasFile('docs')) {
			if($request->file('docs')->isValid()){
	    		$info = $request->except('_token', 'docs');
	    		$path = $request->docs->store('public');
	    		return $request->user()->upload($info['name'], 
	    			$info['description'],
	    			$request->docs->getClientOriginalName(),
	    			$path);

        	}
    		
		}
		
		return false;
	}
}
