@extends('layouts.app')



@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">

		Deactive Users

		<form method="POST" action="./activate">
		    @csrf

			<ul class = "list-group p-lg-2">

		        @foreach ($noactive as $a)


				<li class = "list-group-item">
			    	<div class="checkbox">
				        	<input type="checkbox" name="{{ $a->id }}" />
					        <label for="checkbox">
											
								<span class="badge badge-primary"> {{ $a->name }} </span>
								<span class="badge badge-default"> {{ $a->email }} </span>
								<span class="badge badge-default"> {{ $a->created_at }} </span>
								<span class="badge badge-default"> {{ $a->access }} </span>
								<span class="badge badge-danger">
								
								@if($a->role==='student')
									Student
								@else
									Teacher
								@endif
								</span>					           

					        </label>
				    </div>
				</li>

	        @endforeach


		</ul>
		<input type="submit" value="Grant Permission" class="p-2 float-right btn btn-outline-dark">
	</form>
</div>

<div class="col-md-8 p-4">

	Active Users

	<form method="POST" action="./deactivate">
	    @csrf

		<ul class = "list-group p-lg-2">

	        @foreach ($active as $a)
	 

				<li class = "list-group-item">
				    	<div class="checkbox">
					        	<input type="checkbox" name="{{ $a->id }}" />
						        <label for="checkbox">
												
									<span class="badge badge-default"> {{ $a->name }} </span>
									<span class="badge badge-default"> {{ $a->email }} </span>
									<span class="badge badge-default"> {{ $a->created_at }} </span>
									<span class="badge badge-default"> {{ $a->access }} </span>
									<span class="badge badge-success">
									
									@if($a->role==='student')
										Student
									@else
										Teacher
									@endif
									</span>
						        </label>
					    </div>
					</li>

		        @endforeach


			</ul>
			<input type="submit" value="Dismiss Permission" class="p-2 float-right btn btn-outline-primary">
		</form>
</div>


</div>

</div>
@endsection
