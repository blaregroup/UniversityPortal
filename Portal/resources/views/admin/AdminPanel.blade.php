@extends('layouts.app')



@section('lpanel')
    <div class="bg-secondary border-right position-fixed " id="sidebar-wrapper" style="left:0;top:105px;" >
        <div class="list-group list-group-flush" style="width:13rem;">
            <a href="/home" class="list-group-item list-group-item-action text-white  bg-secondary "><span class="fa fa-home m-2 "></span> Home</a>
            
            <a href="/profile/personal" class="list-group-item list-group-item-action text-white  bg-secondary"><span class="fa fa-user-circle m-2"></span> Profile</a>
            <a href="/admin/add" class="list-group-item list-group-item-action text-white  bg-secondary"><span class="m-2 fa fa-users"></span>  Users</a>        
            <a href="/admin/perm" class="list-group-item list-group-item-action text-white  bg-secondary"> Privilage</a>
            <a href="/upload" class="list-group-item list-group-item-action text-white  bg-secondary"><span class="m-2 fa fa-cloud-upload"></span> Uploads</a>
            <a href="/admin/course" class="list-group-item list-group-item-action text-white  bg-secondary">Course</a>
            <a href="/notice" class="list-group-item list-group-item-action text-white  bg-secondary"> Notification</a>
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
