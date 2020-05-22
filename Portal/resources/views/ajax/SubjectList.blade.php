<ul class="list-group">

	@foreach($subjects as $subject) 
	<li class="list-unstyled my-2">
	<span class="text-capitalize mr-3 font-weight-normal">
		<i class="fa fa-minus-square mr-2"></i>
		{{ $subject->name }}
		( {{ $subject->subcode }} )	
	</span>
	<a onclick="make_request('subject/delete/{{ $subject->id }}')" href="#" class="float-right close" data-dismiss="modal" aria-label="Close">
		<i class="fa fa-trash mr-2"></i>
	</a>
	</li>
	
	@endforeach

</ul>