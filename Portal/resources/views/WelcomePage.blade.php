<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'University Portal ') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@700&display=swap" rel="stylesheet"> 

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>


<body style="background: #2f3542;">
    
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#" style="color: #ffffff; font-family: 'Merienda', cursive;">BlareGroup</a>
      
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto" >
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger " href="/about" style="color: #dfe4ea;">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#Projects" style="color: #dfe4ea;">Projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/contact" style="color: #dfe4ea;">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>








<div class="container text-center " style="margin-top: 20%;">
    <h1 style="color: #f1f2f6;font-family: 'Merienda', cursive;" class="pb-2">
        {{ config('app.name', 'University Portal ') }}
    </h1>
    <p style="color: #f1f2f6;font-family: 'Merienda', cursive;" class="lead">
        A Platform To Build Modern Education In A Systematic Manner
    </p>

    <a href="/login" class="btn btn-lg btn-primary mb-2">Sign In</a>
    <p style="color: #f1f2f6;font-family: 'Merienda', cursive; " > or </p>
    <a href="/register" class="btn btn-lg btn-primary mt-n2" >Sign Up</a>
</div>




<div class="fixed-bottom text-center" style="color: #ced6e0;">
    <p>&copy BlareGroup - A Software Solution Company </p>

</div>

</body>


<!--
<body class="text-center">
    <div class="cover-container d-flex w-100 h-75 p-3    mx-auto flex-column">
  <header class="masthead mb-auto">
    <div class="inner">
      <a href="/"><h3 class="masthead-brand">{{ config('app.name', 'Laravel') }}</h3></a>
      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link active " href="/about">About</a>
        <a class="nav-link active" href="/contact">Contact</a>


      </nav>
    </div>
  </header>

  <main role="main" class="inner cover  pb-lg-10  ">
    <h1 class="cover-heading ">University Portal</h1>
    <p class="lead ">
        A Platform to Build Modern Education in a Systematic manner
    </p>
    <p class="lead">
      <a href="/login" class="btn btn-lg btn-secondary w-16">Login</a>
      <p> or </p>
      <a href="/register" class="btn btn-lg btn-secondary ">Register</a>
    </p>

  </main>

</div>
<div class="inner cover fixed-bottom align-middle">
    <p>&copy BlareGroup - A Software Solution Company </p>

</div>


</body>
-->
</html>