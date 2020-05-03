@extends('layouts.app')



@section('lpanel')

<div class="card mt-5">
    <div class="card-subtitle m-4"> Controls</div>

    <a href="/admin/add" class="bg-secondary text-white text-center font-weight-bold p-3"> Users</a>
    <a href="/admin/perm" class="bg-secondary text-white text-center font-weight-bold p-3"> Privilage</a>
    <a href="/upload" class="bg-secondary text-white text-center font-weight-bold p-3"> Uploads</a>
    <a href="/profile/personal" class="bg-secondary text-white text-center font-weight-bold p-3">Profile</a>
    <a href="/admin/course" class="bg-secondary text-white text-center font-weight-bold p-3">Course</a>
    <a href="/notice" class="bg-secondary text-white text-center font-weight-bold p-3"> Notification</a>
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
