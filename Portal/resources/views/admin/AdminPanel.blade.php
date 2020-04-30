@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header"> Controls</div>
                <a href="/admin/add" class="btn btn-outline-primary btn-sm"> Users</a>
                <a href="/admin/perm" class="btn btn-outline-danger btn-sm"> Privilage</a>
                <a href="/upload" class="btn btn-outline-success btn-sm"> Uploads</a>
                <a href="/profile/personal" class="btn btn-outline-info btn-sm">Profile</a>
                <a href="/admin/course" class="btn btn-outline-dark btn-sm">Course</a>
                <a href="/admin/perm" class="btn btn-outline-success btn-sm"> Notification</a>
            
            </div>

        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <h1 class="text-center"> Welcome User! Nothing To Show Here</h1>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
