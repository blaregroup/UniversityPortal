@extends('layouts.app')



@section('lpanel')

<div class="card text-center p-5">
<div class="card-subtitle font-weight-bold m-4 text-center">Subjects</div>

@foreach ($subjects as $subject)

<a href="?subcode={{ $subject->id }}" class="btn-link">{{ $subject->name }}</a>

@endforeach

</div>

@endsection




@section('content')
<div class="container">




@if($students ?? '')

<table class="table">
  <thead class="thead-default">
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Name</th>
      <th scope="col">Profile Name</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">Link</th>
  </thead>
  <tbody>

    @foreach($students as $student)
    <tr>
      <th scope="row"> {{ $loop->index }}</th>
      <td>{{ $student->name }}</td>
      <td>{{ $student->fname }} </td>
      <td>{{ $student->email }}</td>
      <td>{{ $student->gender}}</td>
      <td>
      	<a href="profile/{{ $student->id }}" target="_blank" class="btn btn-sm btn-success"> Profile 
      	</a>
      	<a href="profile/{{ $student->id }}" target="_blank" class="btn btn-sm btn-primary"> Chat 
      	</a>
      </td>
      
    
    </tr>

	@endforeach



  </tbody>
</table>






@endif


</div>
@endsection



@section('rpanel')
<div class="container">


</div>
@endsection