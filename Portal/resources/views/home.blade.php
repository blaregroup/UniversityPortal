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
                    <a href="/teacher" class="btn btn-primary">Teachers Corner</a>
                    <a href="/student" class="btn btn-secondary">Student Corner</a>
                    <a href="/admin" class="btn btn-success">Administrator Corner</a>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
