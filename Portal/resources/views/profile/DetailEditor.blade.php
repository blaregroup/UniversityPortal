@extends('layouts.app')

@section('content')




<div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
            <div class="card">
                <div class="card-header">{{ $info->fname }}</div>
                <div class="card-body">
                <div class="border-dark border rounded-circle text-center text-capitalize m-5 badge-info" style="width:150px;height:150px;font-size: 100px;">{{ $info->name[0] }}</div>
                <div>
                  <hr>             
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
 
            </div>
        </div>
        <div class="col-lg-6 col-md-offset-2 col-md-8 col-lg-offset-3">

            <div class="card">
                <div class="card-header"> Personal Detail Editor </div>

                <div class="card-body">



                    <form action="./edit" method='POST'>
                        @csrf

                        <div class="item mt-2">
                          <p>Full Name<span class="required">*</span></p>
                          <div class="name-item">
                            <input type="text" name="fname" value="{{ $info->fname }}" required/>
                          </div>
                        </div>

                        <div class="item mt-2">
                          <p>Description<span class="required">*</span></p>
                          <div class="name-item">
                            <input type="text" name="description" value="{{ $info->description }}" required/>
                          </div>
                        </div>

                        <div class="item mt-2">
                          <p>DOB<span class="required">*</span></p>
                          <div class="name-item">
                            <input type="text" name="dob" value="{{ $info->dob }}" required/>
                          </div>
                        </div>


                        <div class="item mt-2">
                          <p>Mother Name<span class="required">*</span></p>
                          <div class="name-item">
                            <input type="text" name="mother_name" value="{{ $info->mother_name }}" required/>
                          </div>
                        </div>

                        <div class="item mt-2">
                          <p>Father Name<span class="required">*</span></p>
                          <div class="name-item">
                            <input type="text" name="father_name" value="{{ $info->father_name }}" required/>
                          </div>
                        </div>


                        <div class="item mt-2">
                          <p>Phone<span class="required">*</span></p>
                          <div class="name-item">
                            <input type="text" name="phone" value="{{ $info->phone }}" required/>
                          </div>
                        </div>


                        <div class="item mt-2">
                          <p>Mother Phone<span class="required">*</span></p>
                          <div class="name-item">
                            <input type="text" name="mphone" value="{{ $info->mphone }}" required/>
                          </div>
                        </div>


                        <div class="item mt-2">
                          <p>Father Phone<span class="required">*</span></p>
                          <div class="name-item">
                            <input type="text" name="fphone" value="{{ $info->fphone }}" required/>
                          </div>
                        </div>


                        <div class="item mt-2">
                          <p>Alternate Phone<span class="required">*</span></p>
                          <div class="name-item">
                            <input type="text" name="alphone" value="{{ $info->alphone }}" required/>
                          </div>
                        </div>
                        <div class="question mt-2">
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



                        <div class="btn-block">
                          <button type="submit" href="/" class="btn btn-outline-success float-right">Save</button>
                        </div>
                    </form>             
                    

                    

                </div>
            </div>





        </div>
    </div>
</div>
@endsection
