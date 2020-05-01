@extends('layouts.app')



@section('content')
<a href="/home" class="btn btn-primary bg-inverse"> Back To Home</a>
<div class="container">


<div class="row">
    <div class="col-md-5">
        <div class="card">
                <div class="card-header">{{ $info->fname }}</div>
                <div class="card-body">
                    <div class="border-dark border rounded-circle text-center text-capitalize m-5 badge-info" style="width:150px;height:150px;font-size: 100px;">{{ $info->name[0] }}</div>
                    <div>             
                    
                        <p><strong>Name : </strong> {{ $info->name }}</p>
                        <p><strong>Full Name : </strong> {{ $info->fname }} </p>
                        <p><strong>Description : </strong> {{ $info->description }}</p>
                        <p><strong>Role  :  </strong> {{ $info->role}}</p>
                        <p><strong>Email : </strong> {{ $info->email }}</p>
                        <p><strong>Phone : </strong> {{ $info->phone }}</p>
                        <p><strong>DOB : </strong> {{ $info->dob }}</p>
                        <p><strong>Gender : </strong> {{ $info->gender }}</p>
                        <p><strong>Mother Name : </strong> {{ $info->mother_name }}</p>
                        <p><strong>Father Name : </strong> {{ $info->father_name }}</p>
                        
                    </div>
                    
                </div>
            
        </div>
    </div>
</div>




</div>

@endsection
