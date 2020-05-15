@extends('layouts.app')


@section('content')
<style type="text/css">
  .card-img{width:50%;height:50%;}

        @media (max-width: 1240px) {

         
          .card-img{width:auto;height:auto;}
          
        }
</style>
<div class="container">
    


<!----- view Profile Modal start ---->
        <div class="modal fade" id="viewProfileModal" tabindex="-1" role="dialog" aria-labelledby="viewProfileCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> View / Edit Details </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="/admin/updateuser" method='post' class="card-body">
                    @csrf
                     <div class="form-group text-center">
                        @if($info->document_id)
                          <img src="/{{$info->document_id}}" class=" p-2 mt-2 img-fluid  img-thumbnail card-img" alt="Profile Pic"/> 
                        @else
                        <img src="https://img1.looper.com/img/gallery/how-thanos-knew-who-tony-stark-was-in-avengers-infinity-war/intro-1533262156.jpg" class=" p-2 mt-2 img-fluid img-thumbnail card-img " alt="Profile Pic"/>
                        @endif
                        
                      </div>
                      <hr/>
                      <div class="row d-flex justify-content-center ">
                        
                            <div class="col-md-6 ">    
                                
                                <div class="form-group" >
                                  <label class="col-md-6 control-label">Full Name :</label>
                                  <div class="col-md-9">
                                    <input class="form-control" type="text" name="name" value="{{ $info->name }}" required/>
                                  </div>
                                </div>  
                                <div class="form-group" >
                                  <label class="col-md-6 control-label">E-mail:</label>
                                  <div class="col-md-9">
                                    <input class="form-control" type="text" name="email" value="{{ $info->email }}" required/>
                                  </div>
                                </div>  
                                <div class="form-group" >
                                  <label class="col-md-6 control-label">Change Password :</label>
                                  <div class="col-md-9">
                                    <input  class="form-control" type="text" name="password" placeholder="Leave Blank For No Change" />
                                  </div>
                                </div> 
                                <div class="form-group" >
                                  <label class="col-md-5 control-label">DOB :</label>
                                  <div class="col-md-9">
                                    <input class="form-control" type="text" name="dob" value="{{ $info->dob }}" placeholder="01/01/1999" required/>
                                  </div>
                                </div> 
                                 <div class="form-group">
                                    <label class="col-md-6 control-label">State</label>
                                    <select id="active" name="active" class="col-md-8 ml-3 form-control">
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
                                <div class="form-group">
                                    <label class="col-md-6 control-label">Access</label>
                                    <select id="access" name="access" class="col-md-8 ml-3 form-control">
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
                                <div class="form-group">
                                    <label class="col-md-6 control-label">Role</label>
                                     <select id="role" name="role" class="col-md-8 ml-3 form-control">
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
                                
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Gender :</label>
                                    <div class="col-md-9">
                                      @if ($info->gender=='male')
                                        <label><input type="radio" value="male" name="gender" required checked /> <span>Male</span></label>
                                        <label><input type="radio" value="female" name="gender" required/> <span>Female</span></label>  
                                      @else ($info->gender=='female')
                                        <label><input type="radio" value="male" name="gender" required checked /> <span>Male</span></label>
                                        <label><input type="radio" value="female" name="gender" required/> <span>Female</span></label>
                                      @endif
                                    </div>
                                </div>
                                                            
                            </div>

                            <div class="col-md-6 ">    
                                
                                <div class="form-group" >
                                  <label class="col-md-5 control-label">Description :</label>
                                  <div class="col-md-9">
                                    <input class="form-control" type="text" name="description" value="{{ $info->description }}" required/>
                                  </div>
                                </div> 
                                <div class="form-group" >
                                  <label class="col-md-5 control-label">Phone :</label>
                                  <div class="col-md-9">
                                     <input class="form-control" type="text" name="phone" value="{{ $info->phone }}" required/>
                                  </div>
                                </div> 
                                <div class="form-group">
                                  <label class="col-md-5 control-label">Father name : </label>
                                  <div class="col-md-9">
                                    <input class="form-control" type="text" name="fathername" value="{{ $info->fathername }}" required/>
                                  </div>
                                </div>   
                                <div class="form-group">
                                  <label class="col-md-5 control-label">Father's Phone : </label>
                                  <div class="col-md-9">
                                    <input class="form-control" type="text" name="fphone" value="{{ $info->fphone }}" required/>
                                  </div>
                                </div>                               
                                <div class="form-group">
                                  <label class="col-md-5 control-label">Mother name :</label>
                                  <div class="col-md-9">
                                    <input class="form-control" type="text" name="mothername" value="{{ $info->mothername }}" required/>
                                  </div>
                                </div>   
                                <div class="form-group">
                                  <label class="col-md-5 control-label">Mother's Phone : </label>
                                  <div class="col-md-9">
                                    <input class="form-control" type="text" name="mphone" value="{{ $info->mphone }}" required/>
                                  </div>
                                </div>   
                                <div class="form-group" >
                                  <label class="col-md-5 control-label">Alternate Phone :</label>
                                  <div class="col-md-9">
                                    <input class="form-control" type="text" name="alphone" value="{{ $info->alphone }}" required/>
                                  </div>
                                </div>                             
                            </div>
                        

                      </div> 
                      <div class="modal-footer">
                        <a href="/admin/manageuser" class="btn btn-secondary" data-dismiss="modal">Close</a>
                        <button type="submit" href="/" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
              </div>
              
            </div>
          </div>
        </div>
<!------ Modal end  ------>




    <div class="col-md-15">
        <div class="card">
            <div class="card-header text-white" style="background: #130f40;">
                <h4 style="display:inline;"><span class="fa fa-users mr-2"></span> Manage User</h4>
                <div class="float-right m-2">
                    <button class="btn btn-primary"><span class="fa fa-filter"></span> Filter</button>
                    <button class="btn btn-success"><span class="fa fa-user-plus"></span> Add user</button>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Sr.</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Role</th>
                        <th scopr="col">State</th>
                        <th scopr="col">Options</th>
                        
                      </tr>
                    </thead>
                    <tbody>            
                        @php ($i=1)
                        @foreach ($users as $user)
                        <tr>
                          <td>{{$i}}</td>
                          <td>{{$user->id}}</td>
                          <td>{{ $user->name}}</td>
                          <td>{{$user->role}}</td>
                          <td>{{$user->active}}</td>
                          <td>  <a href="/home" class="btn btn-primary btn-sm m-1" data-toggle="modal" data-target="#viewProfileModal"><span class="fa fa-eye"></span> View</a> 
                                <button href="/admin/add/{{ $user->id }}" class="btn btn-danger btn-sm m-1"><span class="fa fa-trash"></span> Remove</button>
                                
                          </td>
                        </tr>
                        @php ($i++)
                        @endforeach                
                    </tbody>
                    
                </table>
                
            </div>

        </div>
    </div>

</div>

@endsection
