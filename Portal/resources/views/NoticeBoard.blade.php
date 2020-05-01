@extends('layouts.app')



@section('content')
<a href="/home" class="btn btn-primary bg-inverse">Home</a>
<div class="container">

	<div class="row">
		<div class="col-lg-4">
			<div class="card">
				<div class="card-header">
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
						<input type="submit" name="submit" value="Create" class="mt-3 btn btn-primary" />
					</form>
					
				</div>				
			</div>

			<div class="card">
				
				<div class="card-header">
					Delete Notices
				</div>

				<div class="card-body">
					@foreach ($mynotice as $notice)
						<li class="list-group-item">
						<span>{{ $notice->title }}</span>

						<a href="/notice/delete?id={{ $notice->id }}" class="btn btn-danger btn-sm float-right"> Delete </a>
						</li>
					

					@endforeach

				</div>
			</div>


		</div>
		<div class="col-lg-8">
			@foreach($notices as $notice)
			<div class="card mt-3">
				
				<div class="card-header">
					{{ $notice->title}}
					<span class="badge badge-light float-right">{{ $notice->created_at}}</span>
				</div>
				<div class="card-body">
					{{ $notice->message}}
				</div>

				<div class="card-footer">
					<div class="badge badge-primary p-2">
						{{ $notice->name}}
					</div>

						
					<div class="badge badge-dark p-2 float-right">
						
						{{ $notice->email}}
					</div>	
				</div>
			</div>

			@endforeach
		</div>
	</div>


</div>
@endsection