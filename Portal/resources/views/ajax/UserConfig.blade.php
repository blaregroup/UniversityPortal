<form action="/admin/edit" method='post' class="p-5">
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
<input type="text" name="name" value="{{ $info->name }}" class="form-control" required/>
</div>
</div>

<div class="item mt-3">
<p>Email<span class="required">*</span></p>
<div class="name-item">
<input type="text" name="email" value="{{ $info->email }}" class="form-control" required/>
</div>
</div>

<div class="item mt-3">
<p>Reset Password</p>
<div class="name-item">
<input type="text" name="password" placeholder="Leave Blank For No Change" class="form-control" />
</div>
</div>



<div class="form-group mt-3">
<label class="">State</label>
<select id="active" name="active" class="form-control">
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





<div class="btn btn-block mt-3">
<button type="submit" href="/" class="btn btn-outline-danger">Save</button>
</div>

</form>