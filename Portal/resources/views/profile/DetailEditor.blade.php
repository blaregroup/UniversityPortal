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
                    <p><strong>Mother Name : </strong> {{ $info->mother_name }}</p>
                    <p><strong>Father Name : </strong> {{ $info->father_name }}</p>
                    <p><strong>Phone  : </strong> {{ $info->phone }}</p>
                    <p><strong>Mother Phone : </strong> {{ $info->mphone }}</p>
                    <p><strong>Father Phone : </strong> {{ $info->fphone }}</p>
                    <p><strong>Alternate Phone : </strong> {{ $info->alphone }}</p>
                    <p><strong>Profile Created on : </strong> {{ $info->created_at }}</p>
                    <p><strong>Profile Last Update : </strong> {{ $info->updated_at }}</p>
                </div>
            </div>
        </div>
        </div>
    <div class="row">
          <form action="./edit" method='post'>
                @csrf
                <div class="banner">
                  <h1>Personal Detail Form</h1>
                </div>
                <p class="top-info">Edit Your Personal Information</p>
                <div class="item">
                  <p>Full Name<span class="required">*</span></p>
                  <div class="name-item">
                    <input type="text" name="fname" value="{{ $info->fname }}" required/>
                  </div>
                </div>

                <div class="item">
                  <p>Description<span class="required">*</span></p>
                  <div class="name-item">
                    <input type="text" name="description" value="{{ $info->description }}" required/>
                  </div>
                </div>



            <div class="question">
              <p>Gender<span class="required">*</span></p>
              <div class="question-answer">

              @if ($info->gender=='male')

                <label><input type="radio" value="male" name="gender" required checked /> <span>Male</span></label>
                <label><input type="radio" value="female" name="gender" required/> <span>Female</span></label>          
              @else ($info->gender=='female')
                <label><input type="radio" value="male" name="gender" required checked /> <span>Male</span></label>
                <label><input type="radio" value="female" name="gender" required/> <span>Female</span></label>

              @endif
              </div>
            </div>

                <div class="item">
                  <p>PersonalPhone Number <span class="required">*</span></p>
                  <div class="name-item">
                    <input type="text" name="phone" value="{{ $info->phone }}" required/>
                  </div>
                </div>


                <div class="btn-block">
                  <button type="submit" href="/">Save</button>
                </div>



        </form>             
              
    </div>
</div>

@endsection
