@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        

        <div class="col-md-8 border border-dark p-3">
            

            @if ($info->id=='1')
              <span class="badge badge-success w-100"> ME </span>
            @else
              <span class="badge badge-secondary w-100"> Other </span>
            
            @endif

       <div class="row border border-info p-3">
              <form action="/admin/edit" method='post' class="border border-primary p-3 m-2">
                      @csrf
                  <div class="banner">
                    <h1>Edit Detail</h1>
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


        <div class="col-md-7 border border-dark rounded p-3">
            

                  <div class="banner">
                    <h1>New User</h1>
                  </div>
            <form action="./add", method="post">
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
                        <label class="col-md-4 col-form-label text-md-right">Account State</label>
                             <select id="active" name="active">
                                  <option value="Y" selected>Active</option>
                                  <option value="N">Deactive</option>
                            </select> 
                        </div>


                        <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Account State</label>
                             <select id="role" name="role">
                                  <option value="S" selected>Student</option>
                                  <option value="T">Teacher</option>
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
