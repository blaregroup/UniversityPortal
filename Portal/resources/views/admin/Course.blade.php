@extends('layouts.app')

@section('rpanel')



{{--
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
--}}
   
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
            <div class="card">
                <div class="card-header text-white" style="background: #130f40;">
                  <h4 style="display: inline;"><span class="fa fa-book mr-2"></span>Course Details</h4>
                  <div class="float-right add-button">
                    <button class="btn btn-success btn-sm m-1 font-weight-bold" data-toggle="modal" data-target="#AddCourseModal"><span class="fa fa-plus-square mr-2"></span>New Course</button>
                    
                  </div>
                </div>
                <div class="card-subtitle m-4 font-weight-bold text-center text-white p-2" style="font-weight: bolder; font-size: large; background: #3B3B98; ">
                    <h4 class="form-control-label mr-2" style="display: inline;">Select Course </h4>
                    
                      <select id="select-course"  onchange="window.location.href= '/admin/course?id='+ this.options[this.selectedIndex].value;">
                        <option value="none" class="form-control">None</option>
                        @foreach($AllCourse as $course)
                         <option value="{{$course->id}}" class="form-control">{{$course->name}}</option>
                         @endforeach
                      </select>
                    
                </div>

                @if($Course ?? '')
                    <div class="row ml-2">
                        <div class="ml-1 col font-weight-bold">
                        Course Name : <span class="badge badge-success pl-3 pr-3"style="font-size: 15px;">{{ $Course->name }}</span>
                            
                        </div>
                        <div class="col">
                        <small class="text-muted ">Created On  {{ $Course->created_at }}</small><br/>
                        <small class="text-muted ">Last Updated On {{ $Course->updated_at }}</small>
                        </div>
                    </div>
                <div class="card-body ml-2 font-weight-bold">
                Description : 

                {{ $Course->Description }}
                            
                </div>
                <hr/>
               @endif
                <div class="card-body">
                   
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                  <h6 style="display: inline;" ><i class="fa fa-bookmark m-2" aria-hidden="true"></i>Course Subjects  </h6>
                                    <div class="add-button float-right">
                                        <button class="btn btn-primary btn-sm  font-weight-bold " data-toggle="" data-target="#"><span class="fa fa-edit mr-2"></span>Edit</button>
                                    </div>
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


                                    {{--
                    
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
                                    --}}
                                   @endif



                                </div>
                            </div>

                        </div>


                        <div class="col-md-12 mt-5">
                            <div class="card">
                                <div class="card-header">
                                    
                                    <h6 style="display: inline;" ><i class="fa fa-bookmark-o m-2" aria-hidden="true"></i>All Subjects List </h6>
                                    <div class="add-button float-right">
                                        <button class="btn btn-primary btn-sm  font-weight-bold " data-toggle="modal" data-target="#AddSubjectModal"><span class="fa fa-plus-square mr-2"></span>New Subject</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if($AllSubject ?? '')


                                    <div class="table-responsive">
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
                                              <form action='course?cmd=addsubject&id={{ $Course->id }}' method="POST">
                                              @csrf
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
                                                <input type="submit" name="submit" value="Attach" class="btn float-right btn-outline-success m-1">
                                              </form>              
                                            </tbody>
                                            
                                        </table>
                                        
                                    </div>


{{--
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
                                    --}}
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