@extends('layouts.app')



@section('lpanel')
    <div class=" border-right position-fixed " id="sidebar-wrapper" style="left:0;top:105px; background: #30336b" >
        <div class="list-group list-group-flush" style="width:13rem;">
            <a href="/home" class="list-group-item list-group-item-action text-white" ><span class="fa fa-home m-2 "></span> Home</a>
            
            <a href="/profile/personal" class="list-group-item list-group-item-action text-white"><span class="fa fa-user-circle m-2"></span> Profile</a>
            <a href="/admin/add" class="list-group-item list-group-item-action text-white"><span class="m-2 fa fa-users"></span>  Users</a>        
            <a href="/admin/perm" class="list-group-item list-group-item-action text-white"> 
                <span class=" fa fa-user-secret m-2" style="background: #30336b;"></span>
            Privilage</a>
            <a href="/upload" class="list-group-item list-group-item-action text-white"><span class="m-2 fa fa-cloud-upload"></span> Uploads</a>
            <a href="/admin/course" class="list-group-item list-group-item-action text-white" >
                <span class=" fa fa-book m-2"></span>Course</a>
            <a href="/notice" class="list-group-item list-group-item-action text-white"> 
                <span class="fa fa-envelope m-2"></span> Notification</a>
        </div>
    </div>


@endsection



@section('content')

<div class="card">
    <div class="card-header">Dashboard</div>

    <h1 class="text-center"> Welcome User! Nothing To Show Here</h1>
    </div>
</div>


@endsection


@section('rpanel')

@endsection
