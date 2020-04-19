@extends('layouts.app')



@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
         <div class="well profile">
            <div class="col-sm-12">
                <div class="col-xs-12 col-sm-8">
                        <h2>{{ $info->fname }}</h2>
                    <p><strong>About  :  </strong> {{ $info->description}}</p>
                    <p><strong>Gender : </strong> {{ $info->gender }} </p>
                    <p><strong>DOB : </strong> {{ $info->dob }}</p>
                  </div>             
                
         
    </div>
</div>

@endsection
