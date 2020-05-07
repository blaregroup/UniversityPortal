<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}" defer></script>-->
    <!--<script type="text/javascript">
        function loadSidebar(role)
        {
                if(role='high')
                {
                    console.log('high');
                }
                else if(role='low'){
                    console.log('low');
                }
                else if(role='median')
                {
                    console.log('median');
                }
        }
    </script>
    -->
    

    <!-- Fonts -->
    <!--<link rel="dns-prefetch" href="//fonts.gstatic.com">-->
    <!--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body style="background: #ffffff;">
    @if($message ?? '')
    <div class="alert alert-primary w-100">{{$message ?? '' }}</div>
    @endif

    @if($error ?? '')
    <div class="alert alert-danger w-100">{{ $error ?? '' }}</div>
    @endif

    @if($warning ?? '')
    <div class="alert alert-warning w-100">{{$warning ?? '' }}</div>
    @endif    

    @if($success ?? '')
    <div class="alert alert-success w-100">{{$success ?? '' }}</div>
    @endif



    <div id="app" style="background: #57606f;">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="color: #ffffff">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon" style="color: #ffffff"></span>
                </button>
                <a class="border border-right-0 border-top-0 border-bottom-0 ml-3 pl-4 text-white " id="home-link" href="/home"> Home</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto" >

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" style="color: #ffffff">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}" style="color: #ffffff">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre  style="color: #ffffff">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <div>
                                    <a class="dropdown-item" href="/home"><span class="fa fa-home m-2"></span> Home</a>
                                    <a class="dropdown-item" href="/profile"><span class="m-2 fa fa-user-circle"></span> Profile</a>
                                    <a class="dropdown-item" href="/upload"><span class="m-2 fa fa-cloud-upload"></span> Upload</a>
                                    <a class="dropdown-item" href="/notice"><span class="m-2 fa fa-bell"></span> Notification</a>
                                    <hr>
                                    <a class="dropdown-item" href="/{{ Auth::user()->Role()->first()->role }}/account"><span class="m-2 fa fa-user"></span> Change Password</a>

                                </div>
                                <hr>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
<!--
        <main class="py-4">
            @yield('content')
        </main>
-->
    </div>

<div class="row py-2 mx-1 mt-3">
    <div class="col-sm-2">
        @auth
        <button onclick="window.history.back();" class="btn btn-light">Back</button>
        @endauth
       
       @yield('lpanel')
        
    </div>
    <div class="col-sm-8">
        
        @yield('content')
    </div>
    <div class="col-sm-2">
        @yield('rpanel')
    </div>

</div>
</body>
</html>
