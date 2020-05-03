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
		
		$docs = $request->user()->uploads()->get();
		// post value
		if($request->method()==='POST'){
			if ($request->input('submit')==='Delete' 
				&& $request->input('docid')) {
				$docid = $request->input('docid');
				// delete request
				$docobj = $request->user()->uploads()->find($docid);
				Storage::delete($docobj->hashname);
				$docobj->delete();

			}elseif ($request->input('submit')==='Update' 
				&& $request->input('docid')
				&& $request->input('rename')
				&& $request->input('description')
			) {
				
				$docid = $request->input('docid');
				$rename = $request->input('rename');
				$description = $request->input('description');
				// update request
				$docobj = $request->user()->uploads()->find($docid);
				$docobj->update(['name'=>$rename, 'Description'=>$description]);


			}elseif ($request->input('submit')==='Upload'){
				
				// upload request

				$output = $this->Uploader($request);
				
				if($output){
					return view('UploadFiles', ['success'=>'Successfully Uploaded', 
						'docs'=>$request->user()->uploads()->get(),
						'formmode'=>$request->input('delete')]);
				}else{
					return view('UploadFiles', ['error'=>'Document Not found',
					'docs'=>$request->user()->uploads()->get(),
					'formmode'=>$request->input('delete')]);	
				}


			}


		}
		return view('UploadFiles',['docs'=>$request->user()->uploads()->get(),
		'formmode'=>$request->input('delete')]);
		
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
