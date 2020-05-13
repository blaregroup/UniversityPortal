@extends('layouts.app')



@section('content')
<div class="container">
    <div class="card-group">
            
            <div class="col-md-4">
                @if($info->pic)
                    <img src="/{{$info->pic}}" class="  img-fluid img-thumbnail card-img" alt="Profile Pic"/>
                @else
                    <img src="https://img1.looper.com/img/gallery/how-thanos-knew-who-tony-stark-was-in-avengers-infinity-war/intro-1533262156.jpg" class="  img-fluid img-thumbnail card-img" alt="Profile Pic"/>
                @endif


                <div class="card-body">
                  <h3 class="card-title text-center">{{ $info->fname }}</h3>
                </div>

            </div>
        

       
            <div class="col">
                <div class="card-header text-white " style="background: #130f40;">
                    <h4><span class="fa fa-user mr-2"></span>Details</h4>
                </div>
                <div class="card-body">
                  <div class="card-text pl-2">
                    <p><strong>Name </strong><br> {{ $info->name }} </p>
                    <p><strong>Description </strong><br> {{ $info->description}}</p>
                    <hr class="jumbotron-hr">
                    <p><strong>Gender </strong><br> {{ $info->gender }}</p>
                    <p><strong>DOB </strong><br> {{ $info->dob }}</p>
                    <p><strong>Email </strong><br> {{ $info->email }}</p>
                    <p><strong>Phone </strong><br> {{ $info->phone }}</p>
                    @if($course)
                      <p><strong>Course </strong><br> {{ $course->name}} </p>
                    @endif
                  </div>
                </div>
            </div>
        

    </div>

</div>

@endsection
