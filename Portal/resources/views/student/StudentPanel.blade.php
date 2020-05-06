@extends('layouts.app')


@section('lpanel')

 <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="list-group list-group-flush">-->
        <a href="/home" class="list-group-item list-group-item-action text-white  bg-secondary"><span class="fa fa-home"></span> Home</a>
        <a href="/profile/personal" class="list-group-item list-group-item-action text-white  bg-secondary"><span class="fa fa-user-circle"></span> Profile</a>-->
        <a href="" class="list-group-item list-group-item-action text-white  bg-secondary"><span class="fa fa-calendar"></span> Time Table</a>
        <a href="" class="list-group-item list-group-item-action text-white  bg-secondary"><span class="fa fa-book"></span> Study Material</a>
       <a href="" class="list-group-item list-group-item-action text-white  bg-secondary"><span class="fa fa-edit"></span> Assignments</a>
       <a href="/notice" class="list-group-item list-group-item-action text-white  bg-secondary"><span class="fa fa-envelope-open"></span> Notices</a>-->
      </div>
    </div>-->
    <!-- /#sidebar-wrapper -->




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
