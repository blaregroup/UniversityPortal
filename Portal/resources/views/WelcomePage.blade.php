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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

        /*
        * Globals
        */

        /* Links */
        a,
        a:focus,
        a:hover {
        color: #fff;
        }

        /* Custom default button */
        .btn-secondary,
        .btn-secondary:hover,
        .btn-secondary:focus {
        color: #333;
        text-shadow: none; /* Prevent inheritance from `body` */
        background-color: #fff;
        border: .05rem solid #fff;
        }


        /*
        * Base structure
        */

        html,
        body {
        height: 100%;
        background-color: #333;
        }

        body {
        display: -ms-flexbox;
        display: flex;
        color: #fff;
        text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);
        box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5);
        }

        .cover-container {
        max-width: 100em;
        }


        /*
        * Header
        */
        .masthead {
        margin-bottom: 2rem;
        }

        .masthead-brand {
        margin-bottom: 0;
        }

        .nav-masthead .nav-link {
        padding: .25rem 0;
        font-weight: 700;
        color: rgba(255, 255, 255, .5);
        background-color: transparent;
        border-bottom: .25rem solid transparent;
        }

        .nav-masthead .nav-link:hover,
        .nav-masthead .nav-link:focus {
        border-bottom-color: rgba(255, 255, 255, .25);
        }

        .nav-masthead .nav-link + .nav-link {
        margin-left: 1rem;
        }

        .nav-masthead .active {
        color: #fff;
        border-bottom-color: #fff;
        }

        @media (min-width: 48em) {
        .masthead-brand {
        float: left;
        }
        .nav-masthead {
        float: right;
        }
        }


        /*
        * Cover
        */
        .cover {
        padding: 0 1.5rem;
        }
        .cover .btn-lg {
        padding: .75rem 1.25rem;
        font-weight: 700;
        }


        /*
        * Footer
        */
        .mastfoot {
        color: rgba(255, 255, 255, .5);
        }

</style>


</head>

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

</html>