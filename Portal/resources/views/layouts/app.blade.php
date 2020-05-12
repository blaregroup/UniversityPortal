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
    

    <!-- Fonts -->
    <!--<link rel="dns-prefetch" href="//fonts.gstatic.com">-->
    <!--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
        
        #sidebar-wrapper {
          min-height: 100%;
          z-index: 2;
          -webkit-transition: margin .25s ease-out;
          -moz-transition: margin .25s ease-out;
          -o-transition: margin .25s ease-out;
          transition: margin .25s ease-out;
        }
        #home-link{margin-left:20px; padding-left:20px; color:white;border-left: 1px solid white;}
        #menu-toggle{display: none;}
        .admin-menu-toggle{display: none;}
        

        @media (max-width: 1240px) {

          #menu-toggle{ display: block; }    
          .admin-menu-toggle{ display: block; }
          #sidebar-wrapper { margin-left: -13rem; }
          #wrapper.toggled #sidebar-wrapper { margin-left: 0rem;}
          #home-link{margin-left:0px;padding-left: 0px; border-left:none; }
          
          
        }
    </style>


</head>
<body style="background: #ffffff; ">
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



    <div id="app" style="background: #57606f;" >
        <nav class="navbar navbar-expand-md  navbar-light shadow-sm fixed-top" style="background: #2f3542" >
            <div class="container">
                <div class="navbar-brand">
                    <a  href="{{ url('/') }}" style="color: #ffffff;">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="fa fa-user" style="color: #ffffff"></span>
                    <span class="fa fa-caret-down" style="color: #ffffff"></span>
                </button>
                
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
                                        <span class="m-2 fa fa-sign-out"></span>{{ __(' Logout') }}
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
{{--
        <main class="py-4">
            @yield('content')
        </main>
--}}
    </div>

    
        <div class="navbar navbar-expand-md   shadow-sm position-fixed" style="z-index: 1;background: #3B3B98; width:100%; top:55px;left:0;height:50px;">
            <button onclick="window.history.back();" class="btn text-white "><span class="fa fa-arrow-left m-1"></span> Back</button>
            <a class=" " id="home-link" href="/home"> <i class="fa fa-home m-1" aria-hidden="true"></i>Home</a>
        @auth
            <!-- student/teacher toggle button-->
            @if(Auth::user()->Role()->first()->role!='admin')     
             <button class="btn text-white" id="menu-toggle"><span class="fa fa-bars "></span> Menu</button>
            @endif
            <!--admin toggle button-->
            @if(Auth::user()->Role()->first()->role=='admin')     
             <button class="btn text-white " id="menu-toggle"  class="admin-menu-toggle"><span class="fa fa-bars"></span> Menu</button>
            @endif
        @endauth
        
        </div>
    
<div class="row py-0 mx-0  mb-2 " id="wrapper" style="margin-top: 120px;" >
        
    <div class="col-sm-2" >
       
              
        <!-- Sidebar -->
        @auth           
            <!-- Student Sidebar menus -->
            @if(Auth::user()->Role()->first()->role=='student')
            <div class=" border-right position-fixed " id="sidebar-wrapper" style="top:105px;left:0px;background: #30336b">
                <div class="list-group list-group-flush" style="width:13rem;">
                    <a href="/home" class="list-group-item list-group-item-action text-white  " style="background: #30336b;"><span class="fa fa-home m-2 "></span> Home</a>
                    
                    <a href="/profile/personal" style="background: #30336b;" class="list-group-item list-group-item-action text-white"><span class="fa fa-user-circle m-2"></span> Profile</a>
            
                    <a href="/student/course/" style="background: #30336b;" class="list-group-item list-group-item-action text-white "><span class="fa fa-graduation-cap m-2"></span> Course</a> 
                    <a href="" style="background: #30336b;" class="list-group-item list-group-item-action text-white"><span class="fa fa-calendar m-2"></span> Schedule</a>
                    <a href=""  style="background: #30336b;" class="list-group-item list-group-item-action text-white  "><span class="fa fa-book m-2"></span> Study</a>
                   <a href="" style="background: #30336b;" class="list-group-item list-group-item-action text-white "><span class="fa fa-edit m-2"></span> Assignments</a>
                   <a href="/notice" style="background: #30336b;" class="list-group-item list-group-item-action text-white  "><span class="fa fa-envelope-open m-2"></span> Notification</a>
                </div>
            </div>
            @endif

            <!-- Teacher Sidebar menus -->
            @if(Auth::user()->Role()->first()->role=='teacher')
            <div class=" border-right position-fixed" id="sidebar-wrapper" style="top:105px;left:0px;background: #30336b">
                <div class="list-group list-group-flush" style="width:13rem;>
                    <a href="/home" class="list-group-item list-group-item-action text-white " style="background: #30336b;"><span class="fa fa-home m-2 "></span> Home</a>
                    
                    <a href="/profile/personal" style="background: #30336b;" class="list-group-item list-group-item-action text-white "><span class="fa fa-user-circle m-2"></span> Profile</a>
                    <a href="" style="background: #30336b;" class="list-group-item list-group-item-action text-white "><span class="fa fa-calendar m-2"></span> Schedule</a>
                    <a href="" style="background: #30336b;" class="list-group-item list-group-item-action text-white"><span class="fa fa-book m-2"></span> Study</a>
                    <a href="" style="background: #30336b;" class="list-group-item list-group-item-action text-white "><span class="fa fa-edit m-2"></span> Assignments</a>
                    <a href="/notice" style="background: #30336b;" class="list-group-item list-group-item-action text-white"><span class="fa fa-envelope-open m-2"></span> Notificaton</a>
                 </div>
            </div>
            @endif

            

        @endauth   
    <!-- /#sidebar-wrapper -->
        



       @yield('lpanel')
    </div>
    
    <div class="col-sm-8"   >
           
        @yield('content')
        
    </div>

    <div class="col-sm-2" >
        @yield('rpanel')
    </div>

</div>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");

    });
  </script>

</body>
</html>
