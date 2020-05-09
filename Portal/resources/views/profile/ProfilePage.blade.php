@extends('layouts.app')



@section('content')
<div class="container">
    <div class="card-group">
            
            <div class="card col-md-4">
                <img src="/profilepic.png" class=" p-3  rounded-circle" alt="Profile Pic"/>
                <div class="card-body">
                  <h3 class="card-title text-center">{{ $info->fname }}</h3>
                </div>

            </div>
        

       
            <div class="card col-md-8">
                <div class="card-header bg-secondary text-white " >
                    <h4>Personal Detail</h4>
                </div>
                <div class="card-body">
                  <div class="card-text pl-2">
                    <p><strong>Account Type : </strong> {{ $info->role }}</p>
                    <p><strong>Id : </strong> {{ $info->user_id }} </p>
                    @if(Auth::user()->Role()->first()->role=='student')
                      <p><strong>Course : </strong> {{ $course->name}} </p>
                    @endif
                    <p><strong>DOB : </strong> {{ $info->dob }}</p>
                    <p><strong>Gender : </strong> {{ $info->gender }}</p>
                    <p><strong>Email : </strong> {{ $info->email }}</p>
                    <p><strong>Phone : </strong> {{ $info->phone }}</p>
                  </div>
            </div>
           
    </div>

</div>

@endsection
