@extends('layouts.app')

@section('rpanel')

<div class="p-3" style="position: fixed;">
  
    <div class="add-button m-2 btn-block">
      <button class="btn btn-outline-success btn-block btn-sm" data-toggle="modal" data-target="#AddCourseModal"><span class="fa fa-plus-square mr-2"></span> Course</button>
      
    </div>

    <div class="add-button m-2 btn-block">
    <button class="btn btn-outline-primary btn-block btn-sm" data-toggle="modal" data-target="#AddSubjectModal"><span class="fa fa-plus-square mr-2"></span>Subject</button>
  </div>


    <div class="add-button m-2 btn-block" >
    <button class="btn btn-outline-primary btn-block btn-sm" onclick="state=document.getElementById('newlinks').hidden;if (state) {document.getElementById('newlinks').hidden=false}else{document.getElementById('newlinks').hidden=true;}"><span class="fa fa-pencil-square mr-2"></span>Config</button>
    </div>


    <div class="add-button m-2 btn-block">
    <button class="btn btn-outline-danger btn-sm btn-block " data-toggle="modal" data-target="#"><span class="fa fa-minus-square mr-2"></span>Subject</button>
    </div>

  <div class="m-2 btn-block mt-5">

    <div class="card-subtitle">Course</div>
  <select id="select-course" class="px-2" onchange="window.location.href= '/admin/course?id='+ this.options[this.selectedIndex].value;">
  <option value="none" class="form-control">None</option>
  @foreach($AllCourse as $course)
  <option value="{{$course->id}}" class="form-control">{{$course->name}}</option>
  @endforeach
  </div>
</div>

@endsection

@section('content')
<style>
.add-button button{font-size: 15px;}
@media (max-width:1240px){

.add-button{margin-top: 10px;width:100%; text-align: center; }
.add-button button{display: inline;width:100px; padding-left: 3px;padding-right: 3px; font-size: 12px;}

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
<script>

</script>
<div class="container">
<div class="row">

<div class="col">
<div class="card border-white">
  <div class="card-header text-white mb-4" style="background: #2f3542;">
    <h4 style="display: inline;"><span class="fa fa-book mr-2"></span>Details</h4>
  </div>
  

  @if($Course ?? '')
    <div class="row ml-1 mt-2">
        <div class="ml-1 col font-weight-bold">
        Course Name : 
        <span class="font-weight-normal">{{ $Course->name }}</span>
            
        </div>
        <div class="col">
        <small class="text-muted ">Created On  {{ $Course->created_at }}</small><br/>
        <small class="text-muted ">Last Updated On {{ $Course->updated_at }}</small>
        </div>
    </div>
<div class="card-body ml-2 font-weight-bold">
Description : 

{{ $Course->description }}
            
</div>
<hr/>
@else

<h3 class="text-danger"> 
  Select a course from right side menu
</h3>
 @endif


  <div class="">
     
      <div class="row">
          
          <div class="col-md-12">
              <div class="card border-white">
                  <div class="card-subtitle m-3">
                    <h6 style="display: inline;" ><i class="fa fa-bookmark m-2" aria-hidden="true"></i>Course Subjects  </h6>
                      
                  </div>
                  <div class="card-body">


                     @if($Subject ?? '')
                     
                      <div class="table-responsive">
                          <table class="table">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Sub Code</th>
                                  <th scope="col">Sub Name</th>
                                  <th scope="col">Description</th>
                                  <th scopr="col">Created on</th>
                                </tr>
                              </thead>
                              <tbody>        
                                  @foreach ($Subject as $sub)
                                  <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$sub->subcode }}</td>
                                    <td class="text-capitalize">{{$sub->name}}</td>
                                    <td class="text-capitalize">{{ $sub->description }}</td>
                                    <td>{{$sub->created_at}}</td>
                                      
                                  </tr>
                                  @endforeach                
                              </tbody>
                              
                          </table>
                          
                      </div>

                     @endif



                  </div>
              </div>

          </div>


          <div class="col-md-12 mt-5">
              <div class="card" hidden="true" id="newlinks">
                  <div class="card-subtitle m-2">
                      
                      <h6 style="display: inline;" ><i class="fa fa-bookmark-o m-2" aria-hidden="true"></i>All Subjects List </h6>
                      
                  </div>
                  <div class="text-danger text-center">Note: Linking Course To New Subject Will Unlink from old course automatically </div>
                  <div class="card-body">
                      @if($AllSubject ?? '')


                      <div class="table-responsive">
                        <form action='course?cmd=addsubject&id={{ $Course->id }}' method="POST">
                                @csrf
                          <table class="table table-sm">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Sub Code</th>
                                  <th scope="col">Sub Name</th>
                                  <th scope="col">Description</th>
                                  <th scope="col">Created on</th>
                                  <th scope="col">Add to Course</th>
                                </tr>
                              </thead>
                              <tbody>        
                                
                                  @foreach ($AllSubject as $sub)
                                  <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$sub->subcode }}</td>
                                    <td class="text-capitalize">{{$sub->name}}</td>
                                    <td class="text-capitalize">{{ $sub->description }}</td>
                                    <td>{{$sub->created_at}}</td>
                                    <td><input type="radio" name="subcode" value="{{ $sub->id }}" /></td>
                                  </tr>
                                  @endforeach  
                                  <input type="hidden" name="course_id" value="{{ $Course->id }}" />
                                              
                              </tbody>
                              
                          </table>
                          <input type="submit" name="submit" value="Attach" class="btn float-right btn-outline-success m-1">
                                  
                          </form>
                      </div>


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