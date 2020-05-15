@extends('layouts.app')

@section('rpanel')
<button class="btn btn-primary mx-2"><span class="fa fa-filter"></span> Filter</button>

@endsection


@section('content')

<div class="container"> 
    <div class="row">
        <div class="col">
        <div class="float-right">
        {{ $user->withQueryString()->links()}}
        
      </div>
      
    </div>

</div>

<script type="text/javascript">
function print_resp(){
    if (this.readyState == 4){
        start_loader();
        $("#viewModal").modal()
        document.getElementById('show_config_data').innerHTML=this.responseText;
        stop_loader();

    }
};
</script>


<div class="container">

    <div class="card">
        <div class="card-header text-white" style="background: #130f40;">
            <h4 style="display:inline;"><span class="fa fa-users mr-2"></span> Account</h4>
            <div class="float-right m-2">
                <a class="btn btn-info" href="/admin/add">
                    <span class="fa fa-server"></span> 
                    Reset
                </a>
                <button class="btn btn-primary"><span class="fa fa-filter"></span> Filter</button>
                <button class="btn btn-success"><span class="fa fa-user-plus"></span> New</button>
            </div>
        </div> 
    </div>
    


    <div class="table-responsive">
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scopr="col">Options</th>
            
          </tr>
        </thead>
        <tbody>        
            @foreach ($user as $u)
            <tr>
              <td>{{ $loop->index}}</td>
              <td>{{$u->id}}</td>
              <td>{{ $u->name}}</td>
              <td>{{$u->email}}</td>
              <td>  
                <div>

                    <button class="btn btn-primary btn-sm m-1"   onclick="make_request('users/config?id={{ $u->id }}',print_resp)">
                        <span class="fa fa-eye m-1"></span> Show</button> 


                    <a href="/admin/add/{{ $u->id }}" class="btn btn-danger btn-sm m-1"><span class="fa fa-trash m-1"></span> Remove</a>

                </div>
                    
              </td>
            </tr>
            @endforeach                
        </tbody>
        
    </table>

    </div>  

</div>




<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewProfileCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        View / Edit Config
      </div>
      <div class="modal-body" id="show_config_data">
          HERE
      </div>
    </div>
  </div>
</div>


{{--




<div class="container">
    <div class="row justify-content-center">
        
               
        
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
--}}

@endsection
