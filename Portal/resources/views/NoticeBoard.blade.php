@extends('layouts.app')



@section('lpanel')

	@if(Auth::user()->Role()->first()->role === 'admin')

	<div class="card mt-2">
		
		<div class="card-subtitle font-weight-bold m-3">
			Remove
		</div>

		<div class="card-body">
			@foreach ($mynotice as $notice)
				<li class="list-group-item">
				<span>{{ $notice->title }}</span>

				<a href="/notice/delete?id={{ $notice->id }}" class="btn btn-outline-danger badge-pill btn-sm rounded float-right"> Delete </a>
				</li>
			

			@endforeach

		</div>
	</div>
	@endif

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
				<div class="bg-light text-right">
				 <a data-toggle="collapse" href="#message{{ $notice->id }}" class="bg-light"><span class="fa fa-bars m-1 text-dark"></span>Show</a>

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

	@if(Auth::user()->Role()->first()->role === 'teacher')

	<div class="card mt-2">
		
		<div class="card-subtitle font-weight-bold m-3">
			Remove
		</div>

		<div class="card-body">
			@foreach ($mynotice as $notice)
				<li class="list-group-item">
				<span>{{ $notice->title }}</span>

				<a href="/notice/delete?id={{ $notice->id }}" class="btn btn-outline-danger badge-pill btn-sm rounded float-right"> Delete </a>
				</li>
			

			@endforeach

		</div>
	</div>
	@endif
	
@endsection