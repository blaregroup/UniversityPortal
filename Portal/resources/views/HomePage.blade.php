@extends('layouts.app')



@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card">
                        
                        <a href="/teacher" class="btn btn-outline-primary">Teachers</a>
                        <a href="/student" class="btn btn-outline-secondary">Student</a>
                        <a href="/admin" class="btn btn-outline-success">Administrator</a>
                        <a href="/profile" class="btn btn-outline-info">Profile</a>

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
