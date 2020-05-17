<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    

    
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('js/popper.min.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"  type="text/javascript"></script>
    

    <!--<script src="{{ asset('js/app.js') }}" defer></script>-->


    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <script type="text/javascript">

        function start_loader(){
            document.getElementById('loader').hidden=false;
        };

        function stop_loader(){
            document.getElementById('loader').hidden=true;
        };

        function make_request(url, callhere){
            var xhttp = new XMLHttpRequest();
            xhttp.open('GET', '/ajax/'+url, true);

            if (!callhere) {

            xhttp.onreadystatechange = function() {

                if (this.readyState == 0) {
                    document.getElementById('loader').hidden=false;
                };

                if (this.readyState == 3) {
                    document.getElementById('loader').hidden=true;
                };

                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    }
                console.log(this.readyState);
                };

            }else{
                xhttp.onreadystatechange = callhere;
            };
            return  xhttp.send();

        }

    </script>

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
        
     #sidebar-wrapper a {
            background-color: #30336b;
        }  
      #sidebar-wrapper a:hover {
            background-color: #6468b5;
        }
    #sidebar-wrapper .active{background-color: #6468b5; border:none;}

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
    <div class="alert alert-primary w-100 fixed-bottom text-center">{{$message ?? '' }}</div>
    @endif

    @if($error ?? '')
    <div class="alert alert-danger w-100 fixed-bottom text-center">{{ $error ?? '' }}</div>
    @endif

    @if($warning ?? '')
    <div class="alert alert-warning w-100 fixed-bottom text-center">{{$warning ?? '' }}</div>
    @endif    

    @if($success ?? '')
    <div class="alert alert-success w-100 fixed-bottom text-center">{{$success ?? '' }}</div>
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre  style="color: #ffffff;">
                                    <span class="fa fa-user mr-1"></span>
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

        <div class="clearfix ml-3">
          <div class="spinner-border text-light" id="loader" role="status" hidden=true>
          </div>
        </div>


        </div>
    
<div class="row py-0 mx-0  mb-2 " id="wrapper" style="margin-top: 120px;" >
        
    <div class="col-sm-2" >
       
              
        <!-- Sidebar -->
        @auth           
            <!-- Student Sidebar menus -->
            @if(Auth::user()->Role()->first()->role=='student')
            <div class=" border-right position-fixed " id="sidebar-wrapper" style="top:105px;left:0px;background: #30336b">
                <div class="list-group list-group-flush" style="width:13rem;">
                    <a href="/home" class="list-group-item list-group-item-action text-white "><span class="fa fa-home m-2 "></span> Home</a>
                    
                    <a href="/profile/personal" class="list-group-item list-group-item-action text-white"><span class="fa fa-user-circle m-2"></span> Profile</a>
            
                    <a href="/student/course/"  class="list-group-item list-group-item-action text-white "><span class="fa fa-graduation-cap m-2"></span> Course</a> 
                    <a href=""  class="list-group-item list-group-item-action text-white"><span class="fa fa-calendar m-2"></span> Schedule</a>
                    <a href=""   class="list-group-item list-group-item-action text-white  "><span class="fa fa-book m-2"></span> Study</a>
                   <a href=""  class="list-group-item list-group-item-action text-white "><span class="fa fa-edit m-2"></span> Assignments</a>
                   <a href="/notice"  class="list-group-item list-group-item-action text-white  "><span class="fa fa-envelope-open m-2"></span> Notification
                        <span class="badge badge-danger badge-pill">
                        {{ Auth::user()->unseen_notifications()}}       
                        </span> 

                   </a>
                </div>
            </div>
            @endif

            <!-- Teacher Sidebar menus -->
            @if(Auth::user()->Role()->first()->role=='teacher')
            <div class=" border-right position-fixed" id="sidebar-wrapper" style="top:105px;left:0px;background: #30336b">
                <div class="list-group list-group-flush" style="width:13rem;">
                    <a href="/home" class="list-group-item list-group-item-action text-white "><span class="fa fa-home m-2 "></span> Home</a>
                    
                    <a href="/profile/personal" class="list-group-item list-group-item-action text-white "><span class="fa fa-user-circle m-2"></span> Profile</a>
                    <a href=""  class="list-group-item list-group-item-action text-white "><span class="fa fa-calendar m-2"></span> Schedule</a>
                    <a href="" class="list-group-item list-group-item-action text-white"><span class="fa fa-book m-2"></span> Study</a>
                    <a href=""  class="list-group-item list-group-item-action text-white "><span class="fa fa-edit m-2"></span> Assignments</a>
                    <a href="/notice" class="list-group-item list-group-item-action text-white"><span class="fa fa-envelope-open m-2"></span> Notificaton
                        <span class="badge badge-danger badge-pill">
                        {{ Auth::user()->unseen_notifications()}}       
                        </span> 

                    </a>
                 </div>
            </div>
            @endif

            <!-- -->
            @if(Auth::user()->Role()->first()->role=='admin')


        <div class=" border-right position-fixed " id="sidebar-wrapper" style="left:0;top:105px; background: #30336b" >
                <div class="list-group list-group-flush" style="width:13rem;">
                    <a href="/home" class="list-group-item list-group-item-action text-white" ><span class="fa fa-home m-2 "></span> Home</a>
                    
                    <a href="/profile/personal" class="list-group-item list-group-item-action text-white"><span class="fa fa-user-circle m-2"></span> Profile</a>
                    <a href="/admin/add" class="list-group-item list-group-item-action text-white"><span class="m-2 fa fa-users"></span>  Accounts</a>        
                    <a href="/admin/perm" class="list-group-item list-group-item-action text-white"> 
                        <span class=" fa fa-user-secret m-2" style="background: #30336b;"></span>
                    Privilage</a>
                    <a href="/admin/manageuser" class="list-group-item list-group-item-action text-white"> 
                        <span class=" fa fa-address-book-o m-2" style="background: #30336b;"></span>
                    Users</a>
                    <a href="/upload" class="list-group-item list-group-item-action text-white"><span class="m-2 fa fa-cloud-upload"></span> Uploads</a>
                    <a href="/admin/course" class="list-group-item list-group-item-action text-white" >
                        <span class=" fa fa-book m-2"></span>Course</a>
                    <a href="/notice" class="list-group-item list-group-item-action text-white"> 
                        <span class="fa fa-envelope m-2"></span>
                    Notification
                        <span class="badge badge-danger badge-pill">
                        {{ Auth::user()->unseen_notifications()}}       
                        </span> 
                </a>
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


  
  <!-- Menu Toggle Script & Menu selection Script-->
  <script>
    //menu toggle script
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");

    })
    
  </script>

</body>
</html>
