@extends('layouts.app')




@section('content')
<div class="accordion container">
	<h4 class="text-white p-4" style="background: #1B1464;"> Notifications 

		@if(Auth::user()->Role()->first()->role !== 'student')

		<button class="float-right btn btn-success" data-toggle="modal" data-target="#createnotice" onclick="document.getElementById('noticetitle').value=document.getElementById('noticemessage').value='';"><i class="fa fa-plus m-1" aria-hidden="true"></i>
Create</button>

		@endif
	</h4>
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
				 <a data-toggle="collapse" href="#message{{ $notice->id }}" class="badge float-right badge-light mr-2"><span class="fa fa-eye p-1 toggle-eye" aria-hidden="true"></span></a>

				</div>
			</div>

			@endforeach
		</div>
	</div>

<script>
$('.toggle-eye').on('click', function() {
  $(this).toggleClass('fa-eye fa-eye-slash');
 
});
</script>

</div>



@if(Auth::user()->Role()->first()->role !== 'student')









<div class="modal" tabindex="-1" role="dialog" id="createnotice">






	<div class="modal-dialog">
		<div class=" modal-content">
			

			<div class="modal-header font-weight-bold m-3">
			Create Notice
			</div>
		
			<div>
				

<form action="/notice/create" method="POST" class="p-3 m-3">
	@csrf
	<div class="">
		Title
	</div>
	<input type="text" name="title" placeholder="Title" class="w-100">
	<div class="">
		Message
	</div>
	<textarea name="message" class="w-100"></textarea>
	<br> 


	<hr class="jumbotron-hr">
		
	<input type="submit" name="submit" value="Create" class="m-3 btn btn-success float-right" />
</form>


			</div>
		</div>
		
	</div>

<div>




















{{--



<div class="modal" tabindex="-1" role="dialog" id="createnotice">






	<div class="modal-dialog">
		<div class=" modal-content">
			

		<div class="modal-header font-weight-bold m-3">
			Create Notice
		</div>
		<div class="m-3 p-2">
				<div class="mt-2">
					Title
				</div>
				<input type="text" class="w-100" id="noticetitle" placeholder="Title">
				<div class="mt-5">
					Message
				</div>
				<textarea id="noticemessage" class="w-100" ></textarea>
		</div>				
		<div class="modal-footer">
			<script type="text/javascript">
				function create_notice(){
					var title = document.getElementById('noticetitle').value;
					var message = document.getElementById('noticemessage').value;
					if (title && message) {
					make_request("notice/create?title="+encodeURIComponent(title)+"&message="+encodeURIComponent(message));


					}


				}
			</script>
			<button type="submit" class="mt-3 btn btn-primary" onclick="create_notice();" data-dismiss="modal">Upload </button>
			
		</div>

		</div>
		
	</div>

<div>

	--}}

@endif


@endsection


