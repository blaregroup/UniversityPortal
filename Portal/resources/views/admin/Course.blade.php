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

@endsection

@section('content')
<div class="container">
    <div class="row">
        
        <div class="col">
            <div class="card">
                
                <div class="card-subtitle m-4 font-weight-bold" style="font-weight: bolder; font-size: large;">
                    Course Detail
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