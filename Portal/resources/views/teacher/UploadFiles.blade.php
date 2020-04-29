@extends('layouts.app')

@section('content')
<div class="container">
    
    <form method="Post" action="/upload" enctype="multipart/form-data">  
    @csrf  
    <div>Save As :<input type="text" name="name" value="Doc"> </div>
    <div>Description : <input type="text" name="description" value="Document"></div>
    <div><input type="file" name="docs"> </div><br/>  
    <div><button type="submit">Upload </button></div>        
    </form>  

</div>

@endsection
