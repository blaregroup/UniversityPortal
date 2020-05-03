@extends('layouts.app')



@section('content')
<div class="container">


<div class="row">
    <div class="col-md-5">
        <div class="card">
                <h3 class="card-subtitle m-4 font-weight-bold">{{ $info->fname }}</h3>
                <div class="card-body">
                                
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

    <div class="col-md-3">
         <div class="border rounded-circle text-center text-capitalize float-right" style="width:150px;height:150px;font-size: 100px;">{{ $info->name[0] }}</div>
    </div>
</div>




</div>

@endsection
