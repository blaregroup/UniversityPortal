@extends('layouts.app')

@section('content')
<div class="container">
   
   <div class="jumbotron w-50">
	    <form method="Post" action="/upload" enctype="multipart/form-data" class="form-group">  
	    @csrf  
	    <div class="item mt-3">Save As :</div>
	   	<input type="text" name="name" value="Doc"> 
	    <div class="item mt-3">Description : </div>
	    <input type="text" name="description" value="Document" class="form-control-file">
	    <div class="item mt-4">
	    	<input type="file" name="docs"> 
	    </div>  
	    <div>
	    	<button type="submit" class="mt-3 btn btn-primary">Upload </button>
	    </div>        
	    </form>  
   	

   </div>

</div>

@endsection
