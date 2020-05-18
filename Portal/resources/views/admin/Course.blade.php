@extends('layouts.app')

@section('rpanel')




<div class="card mt-3">
    <div class="card-subtitle m-3 font-weight-bold">
        Add Subject
    </div>

   <div class="card-body">

    <form action='course?cmd=addsubject' method="POST">
        @csrf

        <label class="form-control-label mt-1">Code </label>
        <input type="text" name="subcode" class="form-control" />

        <label class="form-control-label mt-1">Name </label>
        <input type="text" name="name" class="form-control" />
        <label class="form-control-label mt-1">Description</label>
        <input type="text" name="description" class="form-control" />

        <input type="submit" name="submit" value="Add" class="btn btn-primary m-2">
    </form>
       
   </div>
</div>



 <div class="card mt-3">
       <div class="card-subtitle m-3 font-weight-bold">
            Course List
       </div>
       <div class="card-body">
           
           <ul>
                @foreach ($AllCourse as $course)
                    <li class="list-unstyled">
                        <a href="?id={{ $course->id }}">{{ $course->name }}</a>
                    </li>
               @endforeach
           </ul>

       </div>

   </div>

      <div class="card mt-3">
        <div class="card-subtitle m-3 font-weight-bold">
            Add New Course
        </div>

       <div class="card-body">

        <form action='course?cmd=addcourse' method="POST">
            @csrf
            <label class="form-control-label">Name</label>
            <input type="text" name="course" class="form-control" />
            <label class="form-control-label mt-1">Description</label>
            <input type="text" name="description" class="form-control" />

            <input type="submit" name="submit" value="Add" class="btn btn-primary m-1">
        </form>
           
       </div>
   </div>

   
@endsection

@section('content')
<style>
    .header-menu button{font-size: 15px;}
  @media (max-width:1240px){

    .header-menu{margin-top: 10px;width:100%; text-align: center; }
    .header-menu button{display: inline;width:100px; padding-left: 3px;padding-right: 3px; font-size: 12px;}

  }
</style>


<!----- Add Course Modal start ---->
        <div class="modal fade" id="AddCourseModal" tabindex="-1" role="dialog" aria-labelledby="AddCourseCenterTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> Add Course  </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="user_profile_content">
                    <form action='course?cmd=addcourse' method="POST">
                      @csrf
                      <label class="form-control-label">Name</label>
                      <input type="text" name="course" class="form-control" />
                      <label class="form-control-label mt-1">Description</label>
                      <input type="text" name="description" class="form-control" />
                      <input type="submit" name="submit" value="Add" class="btn btn-primary m-2 float-right">
                  </form>
                  
              </div>
              
            </div>
          </div>
        </div>
<!------ Add Course end  ------>

<!----- Add Subject Modal start ---->
        <div class="modal fade" id="AddSubjectModal" tabindex="-1" role="dialog" aria-labelledby="AddSubjectModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> Add Subjects  </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="user_profile_content">
                    <form action='course?cmd=addsubject' method="POST">
                        @csrf

                        <label class="form-control-label mt-1">Code </label>
                        <input type="text" name="subcode" class="form-control" />

                        <label class="form-control-label mt-1">Name </label>
                        <input type="text" name="name" class="form-control" />
                        <label class="form-control-label mt-1">Description</label>
                        <input type="text" name="description" class="form-control" />

                         <input type="submit" name="submit" value="Add" class="btn btn-primary m-2 float-right">
                    </form>
                  
              </div>
              
            </div>
          </div>
        </div>
<!------ Add Subject end  ------>

<div class="container">
    <div class="row">
        
        <div class="col">
            <div class="card">
                <div class="card-header text-white" style="background: #130f40;">
                  <h4 style="display: inline;"><span class="fa fa-book mr-2"></span>Course Details</h4>
                  <div class="float-right header-menu">
                    <button class="btn btn-success btn-sm m-1 font-weight-bold" data-toggle="modal" data-target="#AddCourseModal"><span class="fa fa-plus-square mr-2"></span>New Course</button>
                    <button class="btn btn-primary btn-sm m-1 font-weight-bold" data-toggle="modal" data-target="#AddSubjectModal"><span class="fa fa-plus-square mr-2"></span>New Subject</button>
                  </div>
                </div>
                <div class="card-subtitle m-4 font-weight-bold text-center" style="font-weight: bolder; font-size: large;">
                    <h4 class="form-control-label" style="display: inline;">Select Course </h4>
                    
                      <select id="select-course">
                        <option value="none" class="form-control" selected="1">None</option>
                        @foreach($AllCourse as $course)
                         <option value="{{$course->name}}" class="form-control">{{$course->name}}</option>
                         @endforeach
                      </select>
                    
                </div>

                @if($Course ?? '')
                    <div class="row m-1">
                        <div class="col">
                        Name : {{ $Course->name }}
                            
                        </div>
                        <div class="col">
                            
                        Created : {{ $Course->created_at }}
                        
                        </div>
                    </div>
                <div class="card-body">
                Description : 

                {{ $Course->Description }}
                            
                </div>
               @endif
                <div class="card-body">
                   
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                  
                                  <i class="fa fa-bookmark" aria-hidden="true"></i>



                                    Subjects
                                </div>
                                <div class="card-body">


                                   @if($Subject ?? '')

                    
                                           <div class="row m-1 border border-top-0 mb-2" style="font-weight: bolder;">
                                            
                                             <div class="col-md-2">
                                                 Code
                                             </div>
                                             <div class="col-md-2">
                                               Name  
                                             </div>
                                             <div class="col-md-4">
                                               Description  
                                             </div>
                                             <div class="col-md-3">
                                               Created At  
                                             </div>
                                         </div>

                                        @foreach ($Subject as $sub)
                                         <div class="row m-1">
                                            
                                             <div class="col-md-2">
                                               {{ $sub->subcode }}  
                                             </div>
                                             <div class="col-md-2">
                                               {{ $sub->name }}  
                                             </div>
                                             <div class="col-md-4">
                                               {{ $sub->description }}  
                                             </div>
                                             <div class="col-md-3">
                                               {{ $sub->created_at }}  
                                             </div>
                                         </div>
                                        @endforeach

                                   @endif



                                </div>
                            </div>

                        </div>

                        <div class="col-md-12 mt-3">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                                    Add Subjects
                                </div>
                                <div class="card-body">
                                    @if($AllSubject ?? '')

<div class="row m-1 border border-top-0 mb-2" style="font-weight: bolder;">
                                            
                                             <div class="col-md-2">
                                                 Code
                                             </div>
                                             <div class="col-md-2">
                                               Name  
                                             </div>
                                             <div class="col">
                                               Description  
                                             </div>
                                             <div class="col-md-3">
                                               Created At  
                                             </div>
                                         </div>

                                    <form action='course?cmd=addsubject&id={{ $Course->id }}' method="POST">
                                        @csrf
                                    


                                        @foreach ($AllSubject as $sub)
                                         <div class="row m-1">  
                                             <div class="col-md-2">
                                               {{ $sub->subcode }}  
                                             </div>
                                             <div class="col-md-2">
                                               {{ $sub->name }}  
                                             </div>
                                             <div class="col">
                                               {{ $sub->description }}  
                                             </div>
                                             <div class="col-md-3">
                                               {{ $sub->created_at }}  
                                             </div>
                                            <input type="radio" name="subcode" value="{{ $sub->id }}" />

                                         </div>
                                        @endforeach
                                        <input type="hidden" name="course_id" value="{{ $Course->id }}" />
                                        <input type="submit" name="submit" value="Attach" class="btn float-right btn-outline-success m-1">
                                    </form>
                                        
                                        <p class="text-danger"><i class="fa fa-info-circle" aria-hidden="true"></i>
Note: Linking to new course will detached from old subject.</p>

                                    @endif
                                </div>
                            </div>
                        </div>


                    </div>





                </div>                
            </div>
        </div>

    </div>
</div>
@endsection


@section('lpanel')


@endsection