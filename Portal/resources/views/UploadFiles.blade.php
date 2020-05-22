@extends('layouts.app')


@section('content')
<div class="container">

    @if($formmode)
    <form action="" method="POST">
    @csrf
    @endif
<table class="table">
  <thead class="thead-default">
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Upload At</th>
      <th scope="col">Filename</th>
      <th scope="col">Preview</th>

      @if($formmode)
      <th scope="col">Select</th>
      @endif
    </tr>
  </thead>
  <tbody>

    @foreach($docs as $doc)
    <tr>
      <th scope="row"> {{ $loop->index }}</th>
      <td>{{ $doc->name }}</td>
      <td>{{ $doc->description }} </td>
      <td>{{ $doc->created_at }}</td>
      <td>{{ $doc->originalname}}</td>
      <td><a href="{{ $doc->hashname }}" target="_blank" class="btn btn-sm btn-success"> Preview </a></td>
      
      @if($formmode)
        <td>
        <input type="radio" name="docid" value="{{ $doc->id }}">
        </td>
      @endif
    
    </tr>
        
    @endforeach




  </tbody>
</table>
    @if($formmode)
    <a href="?" class="btn m-2 btn-secondary">Back</a>

    <input type="submit" name="submit" value="Delete" class="btn float-right btn-outline-danger">

    <div class="p-3 m-1">
        <div class="card-subtitle m-2 font-weight-bold"> First Select, Then Insert </div>
        <input type="text" name="rename" placeholder="new name">
        <input type="text" name="description" placeholder="new description">
        <input type="submit" name="submit" value="Update" class="btn btn-outline-success">
        
    </div>
    </form>
    @endif

</div>

@endsection






@section('rpanel')
   
<div class="card-body">
	<div class="card-subtitle font-weight-bold"> New Uploads : </div>
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
    	<button type="submit" class="mt-3 btn btn-primary" name="submit" value="Upload">Upload </button>
    </div>        
    </form>  
	

</div>
<div class="card">
<div class="card-subtitle m-3">Controls</div>    
<a href="?delete=checkbox" class="btn btn-outline-primary m-2">Configuration</a>

</div>

@endsection