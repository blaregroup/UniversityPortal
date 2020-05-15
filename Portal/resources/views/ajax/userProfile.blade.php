<form action="/admin/updateuser" method='post' class="card-body">
@csrf

<div class="form-group text-center">
@if($info->document_id)
  <img src="/{{$info->document_id}}" class="p-2 mt-2 img-fluid  img-thumbnail card-img" alt="Profile Pic"/> 
@else
<img src="https://img1.looper.com/img/gallery/how-thanos-knew-who-tony-stark-was-in-avengers-infinity-war/intro-1533262156.jpg" class=" p-2 mt-2 img-fluid img-thumbnail card-img " alt="Profile Pic"/>
@endif

</div>
<hr/>
<div class="row d-flex justify-content-center ">

<input  type="hidden" name="valueid" value="{{ $info->id }}" required/>

    <div class="col-md-6 ">    

        <div class="form-group" >
          <label class="col-md-6 control-label">E-mail:</label>
          <div class="col-md-9">
            <div class="form-control" >
              {{ $info->email }}
            </div>
          </div>
        </div>  

        
        <div class="form-group" >
          <label class="col-md-6 control-label">Full Name :</label>
          <div class="col-md-9">
            <input class="form-control" type="text" name="name" value="{{ $info->name }}" required/>
          </div>
        </div>  



        <div class="form-group">
          <label class="col-md-5 control-label">Father name : </label>
          <div class="col-md-9">
            <input class="form-control" type="text" name="fathername" value="{{ $info->fathername }}" required/>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-5 control-label">Mother name :</label>
          <div class="col-md-9">
            <input class="form-control" type="text" name="mothername" value="{{ $info->mothername }}" required/>
          </div>
        </div>
        <div class="form-group" >
          <label class="col-md-5 control-label">DOB :</label>
          <div class="col-md-9">
            <input class="form-control" type="text" name="dob" value="{{ $info->dob }}" placeholder="01/01/1999" required/>
          </div>
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
          <label class="col-md-5 control-label">Father's Phone : </label>
          <div class="col-md-9">
            <input class="form-control" type="text" name="fphone" value="{{ $info->fphone }}" required/>
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