@extends('layouts.app')


@section('lpanel')
<!--
<div class="container">
    <div class="card-subtitle">Controls </div>
    <a href="/home" class="btn-block btn btn-link">Home</a>
    <a href="/{{ Auth::user()->role()->first()->role }}" class="btn-block btn btn-link">Panel</a>

    <a href="/{{ Auth::user()->role()->first()->role }}/account" class="btn-block btn btn-link">Account</a>
    
</div>

-->

@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            Notifications

            
            
            <div class="">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
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
                    <a data-toggle="collapse" href="#message{{ $notice->id }}" class="btn-link">Show</a>

                        
                    <div class="badge badge-light p-2 float-right">
                        
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
