@extends('layouts.app')

@section('content')




<div class="container">
    <div class="row">

        <div class="col-md-6">

            <div class="card">
                <div class="card-header"> Update </div>

                <div class="card-body">



                    <form action="./edit" method='POST'>
                        @csrf

                        <div class="item mt-2">
                          <p>Full Name<span class="required">*</span></p>

                          <div class="item">
                            <input type="text" class="form-control" name="fname" value="{{ $info->fname }}" required/>
                          </div>
                        </div>

                        <div class="item mt-2">
                          <p>Description<span class="required">*</span></p>
                          <div class="name-item">
                            <input type="text" class="form-control" name="description" value="{{ $info->description }}" required/>
                          </div>
                        </div>

                        <div class="item mt-2">
                          <p>DOB<span class="required">*</span></p>
                          <div class="name-item">
                            <input type="text" name="dob" class="form-control" value="{{ $info->dob }}" placeholder="01/01/1999" required/>
                          </div>
                        </div>


                        <div class="item mt-2">
                          <p>Mother Name<span class="required">*</span></p>
                          <div class="name-item">
                            <input type="text" name="mother_name" class="form-control" value="{{ $info->mother_name }}" required/>
                          </div>
                        </div>

                        <div class="item mt-2">
                          <p>Father Name<span class="required">*</span></p>
                          <div class="name-item">
                            <input type="text" name="father_name" class="form-control" value="{{ $info->father_name }}" required/>
                          </div>
                        </div>


                        <div class="item mt-2">
                          <p>Phone<span class="required">*</span></p>
                          <div class="name-item">
                            <input type="text" name="phone" class="form-control" value="{{ $info->phone }}" required/>
                          </div>
                        </div>


                        <div class="item mt-2">
                          <p>Mother Phone<span class="required">*</span></p>
                          <div class="name-item">
                            <input type="text" name="mphone" class="form-control" value="{{ $info->mphone }}" required/>
                          </div>
                        </div>


                        <div class="item mt-2">
                          <p>Father Phone<span class="required">*</span></p>
                          <div class="name-item">
                            <input type="text" name="fphone" class="form-control" value="{{ $info->fphone }}" required/>
                          </div>
                        </div>


                        <div class="item mt-2">
                          <p>Alternate Phone<span class="required">*</span></p>
                          <div class="name-item">
                            <input type="text" name="alphone" class="form-control" value="{{ $info->alphone }}" required/>
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
