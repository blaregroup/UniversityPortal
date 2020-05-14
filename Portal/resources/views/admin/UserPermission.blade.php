@extends('layouts.app')

@section('lpanel')
@endsection

@section('content')
<div class="container">
<div class="row w-100">



<ul class="nav nav-tabs w-100 py-2" style="background: #474787;">
    <li class="active">
    	<a data-toggle="tab" href="#menu1" class="btn m-2 btn-light">Grant</a>
    </li>
    <li><a data-toggle="tab" href="#menu2" class="btn m-2 btn-light">Revoke</a></li>
</ul>



  <div class="tab-content w-100">
  	
  	<div class="tab-pane active in" id="menu1">
  		
	<div class="col-lg-12 mt-3">

	<div class="card border border-danger">
		<h3 class="card-subtitle m-3 font-weight-bold">Requests</h3>
       <div class="row font-weight-bold m-2">
       	
       	<div class="col-sm-1"> S.No </div>
       	<div class="col-sm-2">Name </div>
       	<div class="col-sm-3">Email</div>
       	<div class="col-sm-2">Role</div>
       	<div class="col-sm-1">Privilage</div>
       	<div class="col-sm-2">RequestTime</div>
       	
       </div>

		<form method="POST" action="./activate">
    	@csrf

        @foreach ($noactive as $a)

	       <div class="row m-1">
	       	
	       	<div class="col-sm-1">{{ $loop->iteration }}</div>
	       	<div class="col-sm-2">{{ $a->name }} </div>
	       	<div class="col-sm-3">{{ $a->email }}</div>
	       	<div class="col-sm-2 text-capitalize">{{ $a->role }}</div>

	       	<div class="col-sm-1">
	       		@if($a->access==='low')
	       			<span class="badge badge-pill badge-success">
	       				{{ $a->access}}
	       			</span>
	       		@elseif ($a->access==='median')
	       			<span class="badge badge-pill badge-warning">
	       				{{ $a->access}}
	       			</span>
	       		@else
	       			 <span class="badge badge-pill badge-danger">
	       				{{ $a->access}}
	       			</span>      		
	       		@endif
	       	</div>
	       	<div class="col-sm-2">{{ $a->created_at }}</div>
	       	<div class="col-sm-1"><input type="radio" name="userid" value="{{ $a->id }}" /></div>

	       </div>

        @endforeach
			<input type="submit" value="Grant" class="btn btn-outline-danger float-right m-2 mr-5">
		</form>
		
	</div>
</div>



  	</div>

  	<div class="tab-pane fade" id="menu2">
  		

<div class="col-lg-12 mt-3">
	<div class="card border border-success">
	<h3 class="card-subtitle m-3 font-weight-bold">Active</h3>
       <div class="row m-2 font-weight-bold">
       	
       	<div class="col-sm-1"> S.No </div>
       	<div class="col-sm-2">Name </div>
       	<div class="col-sm-3">Email</div>
       	<div class="col-sm-2">Role</div>
       	<div class="col-sm-1">Privilage</div>
       	<div class="col-sm-2">RequestTime</div>
       	
       </div>


	<form method="POST" action="./deactivate">
	    @csrf
	        @foreach ($active as $a)
	 
	       <div class="row m-1">
	       	
	       	<div class="col-sm-1">{{ $loop->iteration }}</div>
	       	<div class="col-sm-2">{{ $a->name }} </div>
	       	<div class="col-sm-3">{{ $a->email }}</div>
	       	<div class="col-sm-2 text-capitalize">{{ $a->role }}</div>
	       	
	       	<div class="col-sm-1">
	       		@if($a->access==='low')
	       			<span class="badge badge-pill badge-success">
	       				{{ $a->access}}
	       			</span>
	       		@elseif ($a->access==='median')
	       			<span class="badge badge-pill badge-warning">
	       				{{ $a->access}}
	       			</span>
	       		@else
	       			 <span class="badge badge-pill badge-danger">
	       				{{ $a->access}}
	       			</span>      		
	       		@endif
	       	</div>
	       	<div class="col-sm-2">{{ $a->created_at }}</div>
	       	<div class="col-sm-1">
	       		<input type="radio" name="userid" value="{{ $a->id }}" /></div>

	       </div>

        @endforeach
			<input type="submit" value="Revoke" class="btn btn-outline-primary float-right m-2 mr-5">
		</form>

	</div>
</div>


  	</div>
  </div>



@endsection
