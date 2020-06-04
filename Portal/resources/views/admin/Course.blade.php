@extends('layouts.app')
<style>
.add-button button{font-size: 15px;}
.subject-table{table-layout: fixed;}
/*small screen*/
@media (max-width:1240px){

.add-button{margin-top: 10px;width:100%; text-align: center; }
.add-button button{display: inline;width:100px; padding-left: 3px;padding-right: 3px; font-size: 12px;}
.subject-table{table-layout: auto;}
}


</style>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
function SearchListFunction(id) {
  // Declare variables
  
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('searchInput');
  filter = input.value.toUpperCase();
  ul = document.getElementById(id);
  li = ul.getElementsByTagName('li');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    txtValue = a.textContent || a.innerText;
   
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      
      li[i].style.display = "inline";

    } else {
      li[i].style.display = "none";
    }
  }
}
</script>
@section('rpanel')

<div class="p-1  mt-3 card" style="border:none;">

  @if($Subject ?? '')
  
  
                
          
          <div style="border:1px solid #2f3542;border-radius: 5px;">
          <div class="card-header text-white font-weight-bold text-center p-1" style="background: #2f3542;">
            View Different Courses
          </div>
          <div class="card-body text-center">
              
              <input type="text" id="searchInput" class="form-control mb-2" onkeyup="SearchListFunction('subject-list-rightPanel')" placeholder="Search course.."/>
               <ul style="list-style: none;" class="m-0 p-0" id="subject-list-rightPanel">
               @foreach($AllCourse as $course)
                  <li class="p-0 m-0">  
                    <a role ="button" href="/admin/course?id={{$course->id}}"class="btn btn-outline-primary m-1 btn-sm" style="font-size: 15px; width:90%;"><span class="fa fa-book mr-2"></span>{{$course->name}}</a>
                  </li>
               @endforeach    
                </ul> 
              
                
          </div>
          </div>

         
        
    
    @endif
</div>
@endsection

@section('content')



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







<!----- Delete Course ---->
<div class="modal fade" id="DeleteCourse" tabindex="-1" role="dialog"  aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
  <h5 class="modal-title" id="DeleteCourseTitle"> Delete Course  </h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body" id="delete_course_list">
      
    
</div>

</div>
</div>
</div>
<!------ Delete Course end  ------>





<!----- Edit course + subject Modal start ---->
<div class="modal fade" id="EditCourseModal" tabindex="-1" role="dialog" aria-labelledby="EditCourseCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"> Edit Course Detail </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @if($Course ?? '')
      <div class="modal-body" >
    
          <form action="" method='POST' class="" role="form-horizontal">

              <div class="form-group" >
                  <label class="col-md-6 control-label">Course Name :</label>
                  <div class="col-md-9">
                    <input class="form-control" type="text" name="fname" value="{{ $Course->name }}" />
                  </div>
              </div>  
              <div class="form-group" >
                  <label class="col-md-5 control-label"> Course Description :</label>
                  <div class="col-md-9">
                    <input class="form-control" type="text" name="description" value="{{ $Course->description}}" required/>
                  </div>
              </div> 
              <hr/>
              @if($Subject ?? '')
              <div class="col-md-12">
                  <div class="card border-white">
                      <div class="card-subtitle mt-1 ml-3 pb-0">
                        <h5 style="display: inline;" ><i class="fa fa-bookmark m-2" aria-hidden="true"></i>Course Subjects  </h5>
                          
                      </div>
                      <div class="card-body">
                         
                          <div class="table-responsive">
                              <table class="table subject-table" style="font-size: 12px;">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th scope="col" style="width:5%;">#</th>
                                      <th scope="col" style="width:12%;">Sub Code</th>
                                      <th scope="col" style="width:18%;">Sub Name</th>
                                      <th scope="col" style="width:45%;">Description</th>
                                      <th scopr="col" style="width:20%;">Created on</th>
                                    </tr>
                                  </thead>
                                  <tbody>        
                                      @foreach ($Subject as $sub)
                                      <tr>
                                        <td><a href=""><span class="fa fa-trash " data-toggle="tooltip" data-placement="bottom" title="Remove Subject" style="color:red; font-size:14px;"></span></a></td>
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

              <input type="submit" name="submit" value="Save Changes" class="btn btn-primary m-2 float-right">
          </form>
      </div>
      @endif
    </div>
  </div>
</div>
<!------ Edit Course + Subject modalend  ------>


<div class="container">
<div class="row">

<div class="col">
<div class="card border-white">
  <div class="card-header text-white mb-4" style="background: #2f3542;">
    <h4 style="display: inline;"><span class="fa fa-book mr-2"></span>Course Details</h4>
    <div class="float-right add-button">
      <button class="btn btn-success btn-sm  font-weight-bold" data-toggle="modal" data-target="#AddCourseModal"><span class="fa fa-plus-square mr-2"></span>New Course</button>
      <button class="btn btn-danger btn-sm " data-toggle="modal" data-target="#DeleteCourse" onclick="document.getElementById('DeleteCourseTitle').textContent='Delete Course';make_request('course/list', render_course_list)"><span class="fa fa-minus-square mr-2"></span>Course</button>
      
    </div>
  </div>
  
  
  

  @if($Course ?? '')
    
    <div class="row ml-1 mt-2 ">

        <div class="ml-1 col font-weight-bold">
        Course Name : 
        <span class="font-weight-normal">{{ $Course->name }}</span>
            
        </div>
       
    </div>
    <div class="card-body ml-1 font-weight-bold">
    Description : 
    <span class="font-weight-normal">{{ $Course->description }}</span>
                
    </div>
    <button class="btn btn-warning btn-sm ml-5 mr-5 font-weight-bold" data-toggle="modal" data-target="#EditCourseModal"><span class="fa fa-pencil-square mr-2"></span>Edit Course</button>
     <div class="ml-4 mr-4 mb-0 pb-0">
            <small class="text-muted ">Created On  {{ $Course->created_at }}</small>
            <small class="text-muted pull-right ">Last Updated On {{ $Course->updated_at }}</small>
            </div>
    <hr class="mt-1 mb-2 "/>
    @else
    <div class="card-subtitle  font-weight-bold text-center mb-3 pr-2" style="font-weight: bolder; font-size: large;  ">
                
          
          
          <div class="card-title">
            Available Courses
            <hr class="mb-0"/>
          </div>
          <div class="card-body">
              
                <input type="text" id="searchInput" class="form-control mb-2" onkeyup="SearchListFunction('subject-list-mainPanel')" placeholder="Search course.."/>
                <ul style="list-style: none;" id="subject-list-mainPanel">
               @foreach($AllCourse as $course)
                  <li style="display: inline;">  
                    <a role ="button" href="/admin/course?id={{$course->id}}"class="btn btn-outline-primary m-1 btn-sm" style="font-size: 20px; width:auto;"><span class="fa fa-book mr-2"></span>{{$course->name}}</a>
                  </li>
               @endforeach    
                </ul>
               
               
          </div>
          

         
        
    </div>

    @endif


  <div class="">
     
      <div class="row">
         @if($Subject ?? '')
          <div class="col-md-12">
              <div class="card border-white">
                  <div class="card-subtitle mt-1 ml-3 pb-0">
                    <h5 style="display: inline;" ><i class="fa fa-bookmark m-2" aria-hidden="true"></i>Course Subjects  </h5>
                      
                  </div>
                  <div class="card-body">

          

                    
                     
                      <div class="table-responsive">
                          <table class="table subject-table" >
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col" style="width:5%;">#</th>
                                  <th scope="col" style="width:12%;">Sub Code</th>
                                  <th scope="col" style="width:18%;">Sub Name</th>
                                  <th scope="col" style="width:45%;">Description</th>
                                  <th scopr="col" style="width:20%;">Created on</th>
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

<script type="text/javascript">
  function render_course_list(){

    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      document.getElementById("delete_course_list").innerHTML= this.responseText;
   }

  }

</script>


@endsection


@section('lpanel')


@endsection