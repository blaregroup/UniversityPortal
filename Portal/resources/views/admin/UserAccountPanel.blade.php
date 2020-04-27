@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        

        <div class="col-md-8">
            

        @if ($info->role==='admin')
          <span class="badge badge-success w-100"> Admin </span>
        @elseif ($info->role==='student')
          <span class="badge badge-secondary w-100"> Student </span>
        @else ($info->role==='teacher')
        <span class="badge badge-warning w-100"> Teacher </span>
        @endif


       <div class="row border border-info p-3 m-5">
              <div class="card card-primary"> 
                <p class="m-2"> Select  User </p>
          <ul class = "list-group p-lg-2">

                @foreach ($user as $u)
         

              <li class = "list-group-item">
                      <a href="/admin/add/{{ $u->id }}">
                        
                      <span class="badge badge-default"> {{ $u->name }} </span>
                      <span class="badge badge-default"> {{ $u->email }} </span>

                      </a>

              </li>

                @endforeach


          </ul>

           </div>

              <form action="/admin/edit" method='post' class="border border-primary p-3 m-3">
                      @csrf
                  <div class="banner">
                    <h4> Edit {{ $info->name }} </h4>
                  </div>
                  <input type="hidden" name="id" value="{{ $info->id }}" />
                  <div class="item">
                    <p>Name<span class="required">*</span></p>
                    <div class="name-item">
                      <input type="text" name="name" value="{{ $info->name }}" required/>
                    </div>
                  </div>

                  <div class="item">
                    <p>Email<span class="required">*</span></p>
                    <div class="name-item">
                      <input type="text" name="email" value="{{ $info->email }}" required/>
                    </div>
                  </div>

                  <div class="item">
                    <p>Reset Password<span class="required">*</span></p>
                    <div class="name-item">
                      <input type="text" name="password" placeholder="Leave Blank For No Change" />
                    </div>
                  </div>

                  <div class="btn-block">
                    <button type="submit" href="/">Save</button>
                  </div>
              </form>
            </div>
        <div class="col-md-7 border border-dark rounded p-3 m-5">
            

                  <div class="banner">
                    <h1>New User</h1>
                  </div>
            <form action="/admin/add", method="post">
                  @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control " name="name" value="" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email" value="" required autocomplete="email">

                                                            </div>
                        </div>

                        


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control " name="password" required autocomplete="new-password">

                                                            </div>
                        </div>

                        
                        <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">State</label>
                             <select id="active" name="active">
                                  <option value="1" selected>Active</option>
                                  <option value="0">Deactive</option>
                            </select> 
                        </div>


                        <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Role</label>
                             <select id="role" name="role">
                                  <option value="student" selected>Student</option>
                                  <option value="teacher">Teacher</option>
                            </select> 
                        </div>


                        <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Access</label>
                             <select id="access" name="access">
                                  <option value="low" selected>Student</option>
                                  <option value="median">Teacher</option>
                                  <option value="high">Admin</option>
                            </select> 
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
            </form>

        </div>

      </div>

    </div>
</div>
@endsection
