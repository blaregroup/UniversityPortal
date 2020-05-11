@extends('layouts.app')



@section('lpanel')

	

@endsection

@section('content')
<div class="accordion container">
	<h4 class="text-dark"> Notifications </h4>
	<div class="row">
		
		<div class="col">
			@foreach($notices as $notice)
			<div class="card mt-3">
				
				<div class="card-subtitle font-weight-bold m-3">
					{{ $notice->title}}


					<span class="badge float-right">{{ $notice->created_at}}


					</span>
				
				</div>
				<div class="collapse card-body" id="message{{ $notice->id }}">

						{{ $notice->message}}

				</div>

				<div class="card-footer bg-white">
					<div class="badge badge-light badge-pill p-2">
						{{ $notice->name}}
					</div>
					
						
					<div class="badge badge-light p-2 float-right">
						
						{{ $notice->email}}
					</div>	

				</div>
				<div class="jumbotron-fluid m-2">

				@if(Auth::user()->id == $notice->user_id )

				<a href="/notice/delete?id={{ $notice->id }}" class="badge badge-light ml-2">
					<i class="fa fa-trash p-2" aria-hidden="true"> Delete</i>

				</a>

				@endif
				 <a data-toggle="collapse" href="#message{{ $notice->id }}" class="badge float-right badge-light mr-2"><span class="fa fa-toggle-on p-1" aria-hidden="true"></span></a>

				</div>
			</div>

			@endforeach
		</div>
	</div>



</div>


@endsection


@section('rpanel')
	
	@if(Auth::user()->Role()->first()->role !== 'student')
	
	<div class="card mr-2">
		<div class="card-subtitle font-weight-bold m-3">
			Create Notice
		</div>
		<div class="card-body">
			<form action="/notice/create" method="POST">
				@csrf
				<div class="item mt-3">
					Title
				</div>
				<input type="text" name="title" placeholder="Title">
				<div class="item mt-3">
					Message
				</div>
				<textarea name="message">
					
				</textarea>
				<br> 
				<input type="submit" name="submit" value="Create" class="mt-3 btn btn-outline-primary" />
			</form>
			
		</div>				
	</div>

	@endif

	
	
@endsection