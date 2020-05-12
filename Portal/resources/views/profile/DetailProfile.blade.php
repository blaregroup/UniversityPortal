@extends('layouts.app')



@section('content')
<div class="container">
        <div class="card-group">
            
                <div class="col-md-4">
                    @if($info->pic)
                    <img src="/{{$info->pic}}" class=" p-2 mt-2 img-fluid img-thumbnail card-img" alt="Profile Pic"/> 
                    @else
                    <img src="https://img1.looper.com/img/gallery/how-thanos-knew-who-tony-stark-was-in-avengers-infinity-war/intro-1533262156.jpg" class=" p-2 mt-2 img-fluid img-thumbnail card-img" alt="Profile Pic"/>
                    @endif

                    <div class="card-body">
                      <h3 class="card-title text-center">{{ $info->fname }}</h3>
                      <hr class="jumbotron-hr"/>
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
            

           
                <div class="col">
                    <div class="card-header text-white " style="background: #130f40;">
                        <h4>Details</h4>
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
                        <hr class="jumbotron-hr"/>
                        <p><strong>Alternate Phone : </strong> {{ $info->alphone }}</p>
                        <p><strong>Mother Phone : </strong> {{ $info->mphone }}</p> 
                        <p><strong>Father Phone : </strong> {{ $info->fphone }}</p>
                        

                        </div>
                        <br/>
                        <div class="pull-right">
                            <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                          Update Pic
                        </button>
                        <a href="./personal/edit" class="btn btn-success btn-sm">Edit Profile</a>
                        <a href="./{{ $info->user_id}}" class="btn btn-primary btn-sm">View Profile</a>
                        </div>
                    </div>
                </div>
           
        </div>
     <div class="card-footer mt-3" style="background: #d1d8e0;">
      <small class="text-muted ">Created On  {{ $info->created_at }}</small>
      <small class="text-muted pull-right">Last Updated On {{ $info->updated_at }}</small>
    </div>

</div>
<div class="modal" tabindex="-1" role="dialog" id="exampleModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form method="POST" action="./personal/edit" enctype="multipart/form-data" class="form-group">  
      <div class="modal-body">
        @csrf  
        <input type="file" name="profilepic"> 
        
    </div>
    <div class="modal-footer">
        <button type="submit" class="mt-3 btn btn-primary" name="submit">Upload </button>
    </div>        
    </form>  
    </div>
  </div>
</div>


@endsection
