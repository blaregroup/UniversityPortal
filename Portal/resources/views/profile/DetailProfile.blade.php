@extends('layouts.app')



@section('content')
<div class="container">
        <div class="card-group">
            
                <div class="card col-md-4">
                    <img src="/profilepic.png" class=" p-3  rounded-circle" alt="Profile Pic"/>
                    <div class="card-body">
                      <h3 class="card-title text-center">{{ $info->fname }}</h3>
                      <hr class="bg-secondary"/>
                      <div class="card-text pl-2">
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
            

           
                <div class="card col-md-8">
                    <div class="card-header bg-secondary text-white " >
                        <h4>Personal Detail</h4>
                    </div>
                    <div class="card-body">
                      <div>
                        
                        <p><strong>Name : </strong> {{ $info->fname }}</p>
                        <p><strong>Account Type : </strong> {{ $info->role }}</p>
                        <p><strong>Description : </strong> {{ $info->description }}</p>
                        <p><strong>Father Name : </strong> {{ $info->father_name }}</p>
                        <p><strong>Mother Name : </strong> {{ $info->mother_name }}</p>
                        <br/><br/>
                        <h5 class="card-title ml-n3" ><strong>Contact Detail :- </strong></h5>
                        <hr class="bg-secondary ml-n3"/>
                        <p><strong>Alternate Phone : </strong> {{ $info->alphone }}</p>
                        <p><strong>Mother Phone : </strong> {{ $info->mphone }}</p> 
                        <p><strong>Father Phone : </strong> {{ $info->fphone }}</p>
                        

                        </div>
                        <br/>
                        <div class="pull-right">
                        <a href="./personal/edit" class="btn btn-success">Edit Profile</a>
                        <a href="./{{ $info->user_id}}" class="btn btn-primary">View Profile</a>
                        </div>
                    </div>
                </div>
           
        </div>
     <div class="card-footer">
      <small class="text-muted ">Created On  {{ $info->created_at }}</small>
      <small class="text-muted pull-right">Last Updated On {{ $info->updated_at }}</small>
    </div>

</div>

@endsection
