@extends('layouts.app')



@section('content')
<div class="container">

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
          <!--
          <div class="card m-3">
              <div class="card-header">Role</div>
              <div class="card-body">
                <p><strong>Role  :  </strong> {{ $info->role}}</p>
                <p><strong>Access</strong> {{ $info->access }}</p>
                <p><strong>Create At</strong> {{ $info->created_at }}</p>
                <p><strong>Last Update</strong> {{ $info->updated_at }}</p>
                
              </div>
          </div>
			-->
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
@endsection