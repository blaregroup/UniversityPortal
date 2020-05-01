@extends('layouts.app')



@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                        
                        <a href="/teacher" class="btn btn-outline-primary">Teacher Panel</a>
                        <a href="/student" class="btn btn-outline-secondary">Student Panel</a>
                        <a href="/admin" class="btn btn-outline-success">Admin Panel</a>
                        <a href="/profile" class="btn btn-outline-info">Profile Panel</a>
                        <a href="/upload" class="btn btn-outline-warning">Document Panel</a>
                        <a href="/notice" class="btn btn-outline-danger">Notification Panel</a>

                    </div>
        </div>
        <div class="col-md-8 border border-secondary rounded p-3">
            
            <div class="container">
            <h2 class="font-weight-bold">Notifications</h2>    
            </div>

            
            
            <div class="">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            @foreach($notices as $notice)
            <div class="card mt-3">
                
                <div class="card-subtitle p-2">
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
    </div>
</div>
@endsection
