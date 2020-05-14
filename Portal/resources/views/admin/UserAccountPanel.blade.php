@extends('layouts.app')

@section('rpanel')
<div class="card mt-2"> 
<div class="card-subtitle font-weight-bold m-3"> Select  User </div>
    <ul class = "list-group p-lg-2">
    @foreach ($user as $u)
    <li class = "nav">
      <a href="/admin/add/{{ $u->id }}">
      <span class="mx-2 border border-right-0 mr-3"> {{ $u->email }} </span>
      </a>

    </li>
    @endforeach
    </ul>
</div>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        
                <div class="col p-3 card">
                    <form action="/admin/edit" method='post' class="card-body">
                    @csrf
                    <div class="banner">
                    <h5 class="font-weight-normal"> 
                        {{ $info->name }} 

                    @if ($info->role==='admin')
                        <p class="badge badge-pill badge-success"> Admin </p>
                    @elseif ($info->role==='student')
                        <p class="badge badge-pill badge-secondary"> Student </p>
                    @else ($info->role==='teacher')
                        <p class="badge badge-pill badge-warning"> Teacher </p>
                    @endif
                    </h5>
                    </div>
                    <input type="hidden" name="id" value="{{ $info->id }}" />
                    <div class="item mt-2">
                        <p>Name<span class="required">*</span></p>
                        <div class="name-item">
                            <input type="text" name="name" value="{{ $info->name }}" required/>
                        </div>
                    </div>

                    <div class="item mt-3">
                        <p>Email<span class="required">*</span></p>
                        <div class="name-item">
                            <input type="text" name="email" value="{{ $info->email }}" required/>
                        </div>
                    </div>

                    <div class="item mt-3">
                        <p>Reset Password</p>
                        <div class="name-item">
                            <input type="text" name="password" placeholder="Leave Blank For No Change" />
                        </div>
                    </div>



                    <div class="form-group row mt-3">
                        <label class="col-md-4 col-form-label">State</label>
                        <select id="active" name="active" class="col-md-8 form-control">
                            <option value="1"
                            @if($info->active==='1')
                            selected="1"
                            @endif
                            >Active</option>
                            <option value="0"
                            @if($info->active==='0')
                            selected="0"
                            @endif
                            >Deactive</option>
                        </select> 
                    </div>


                    <div class="form-group row mt-3">
                        <label class="col-md-4 col-form-label">Role</label>
                        <select id="role" name="role" class="col-md-8 form-control">
                            <option value="student" 
                            @if ($info->role==='student')

                            selected="1"
                            
                            @endif

                            >Student</option>
                            <option value="teacher"

                            @if($info->role==='teacher')
                            selected="1"

                            @endif

                            >Teacher</option>

                            <option value="admin"

                            @if($info->role==='admin')
                            selected="1"

                            @endif

                            >Admin</option>

                        </select> 
                    </div>


                    <div class="form-group row mt-3">
                        <label class="col-md-4 col-form-label">Access</label>
                        <select id="access" name="access" class="col-md-8 form-control">
                            <option value="low" 
                            @if ($info->access==='low')

                            selected="1"
                            
                            @endif

                            >Low</option>
                            <option value="median"

                            @if ($info->access==='median')

                            selected="1"
                            
                            @endif

                            >Median</option>
                            <option value="high"
                            @if ($info->access==='high')
                            selected="1"
                            @endif

                            >High</option>
                        </select> 
                    </div>


                    <div class="btn btn-block mt-3">
                        <button type="submit" href="/" class="btn btn-outline-danger">Save</button>
                    </div>

                    </form>
                </div>
        
        <div class="col">


            <div class="card m-3 p-0 float-right">
                


                <div class="card-header">
                    Add User
                </div>

                <form action="/admin/add", method="post" class="card-body">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Name</label>

                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control " name="name" value="" required autocomplete="name" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label">E-Mail Address</label>

                        <div class="col-md-8">
                            <input id="email" type="email" class="form-control " name="email" value="" required autocomplete="email">

                        </div>
                    </div>




                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label">Password</label>

                        <div class="col-md-8">
                            <input id="password" type="password" class="form-control " name="password" required autocomplete="new-password">

                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-4 col-form-label">Role</label>
                        <select id="role" name="role" class="col-md-8 form-control">
                            <option value="student" onclick="toggle_student();" selected>Student</option>
                            <option value="teacher" onclick="toggle_teacher();">Teacher</option>
                        </select> 
                    </div>

                    <div class="form-group row" id="cou_sub_toggle">
                        

                    </div>


                    <script type="text/javascript">
                        function toggle_student() {
                            // body...
                            document.getElementById('cou_sub_toggle').innerHTML=`
                            <label class="col-md-4 col-form-label">Course</label>
                        
                            <select id="role" name="course" class="col-md-8 form-control">
                                
                                <option value="bca" >BCA</option>
                                <option value="bca" >MCA</option>
                                <option value="bca" >MSC</option>
                            </select> 
                        
                            `;
                        };

                        function toggle_teacher() {
                            // body...
                            document.getElementById('cou_sub_toggle').innerHTML=`
                        <label class="col-md-4 col-form-label">Subject</label>
                        
                        <select id="role" name="subject" class="col-md-8 form-control">
                            <option value="subo1" >Sub01</option>
                            <option value="subo1" >Sub02</option>
                            <option value="subo1" >Sub03</option>
                        </select> 
                            `;
                        }
                        toggle_student();
                    </script>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label">State</label>
                        <select id="active" name="active" class="col-md-8 form-control">
                            <option value="1" selected>Active</option>
                            <option value="0">Deactive</option>
                        </select> 
                    </div>




                    <div class="form-group row">
                        <label class="col-md-4 col-form-label">Access</label>
                        <select id="access" name="access" class="col-md-8 form-control">
                            <option value="low" selected>Low</option>
                            <option value="median">Median</option>
                            <option value="high">High</option>
                        </select> 
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                            Add
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            
        </div>
    </div>
</div>


@endsection
