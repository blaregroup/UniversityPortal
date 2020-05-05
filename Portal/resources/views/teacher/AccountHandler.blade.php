@extends('layouts.app')


@section('content')



<div class="col p-3 card">

<div class="card-subtitle"> Account Configuration </div>
<form action="" method='post' class="card-body">
@csrf
<div class="banner">
<h5 class="font-weight-normal"> 
    {{ $info->name }} 
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


<div class="btn btn-block mt-3">
    <button type="submit" href="/" class="btn btn-outline-danger">Save</button>
</div>

</form>
</div>


@endsection