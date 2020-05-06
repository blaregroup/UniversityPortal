@extends('layouts.app')



@section('content')



<div class="container">
    <div class="row mt-4">

      <div class="col-md-6">
        
            <div class="card">
                <h4 class="card-subtitle m-3">{{ $info->fname }}</h4>
                <div class="card-body">
                <div>
                <p><strong>User ID : </strong> {{ $info->id }}</p>
                <p><strong>Name : </strong> {{ $info->name }}</p>
                <p><strong>Full Name : </strong> {{ $info->fname }} </p>
                <p><strong>Description : </strong> {{ $info->description }}</p>
                <p><strong>Email : </strong> {{ $info->email }}</p>
                <p><strong>Phone : </strong> {{ $info->phone }}</p>
                
                <p><strong>DOB : </strong> {{ $info->dob }}</p>
                <p><strong>Gender : </strong> {{ $info->gender }}</p>
                <p><strong>Phone</strong> {{ $info->phone }}</p>
                <p><strong>Alternate Phone</strong> {{ $info->alphone }}</p>
                <hr>
                <p><strong>Mother Name : </strong> {{ $info->mother_name }}</p>
                <p><strong>Mother Phone</strong> {{ $info->mphone }}</p>
                <p><strong>Father Name : </strong> {{ $info->father_name }}</p>
                <p><strong>Father Phone</strong> {{ $info->fphone }}</p>
                

                </div>
                    
                </div>
                
              @auth
              <div>
                <a href="./personal/edit" class="btn btn-outline-success m-3">Edit</a>
                <a href="./{{ $info->user_id}}" class="btn btn-success m-3 float-right">Display Profile</a>
              </div>
              @endauth
                
            </div>

      </div>

      <div class="col-md-6">
          <div class="card m-3">
              <div class="card-header">Course</div>
              <div class="card-body">
                  @if ($course)
                    <p><strong>Name  :  </strong> {{ $course->name}}</p>
                    <p><strong>Description  :  </strong> {{ $course->Description}}</p>    
                  @endif
              </div>
          </div>

          <div class="card m-3">
              <div class="card-header">Role</div>
              <div class="card-body">
                <p><strong>Role  :  </strong> {{ $info->role}}</p>
                <p><strong>Access</strong> {{ $info->access }}</p>
                <p><strong>Create At</strong> {{ $info->created_at }}</p>
                <p><strong>Last Update</strong> {{ $info->updated_at }}</p>
                
              </div>
          </div>

          <div class="card m-3">
              <div class="card-header">Subject</div>
              <div class="card-body">
                  @if ($subjects)
                    @foreach ($subjects as $sub)
                        <p><strong>Name  :  </strong> {{ $sub->name}}</p>
                    @endforeach
                  @endif
              </div>
          </div>

      </div>
    </div>

</div>
@endsection
