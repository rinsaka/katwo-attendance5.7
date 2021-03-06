<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- JS -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
      $('.expansion_link0').click(function () {
        $('.attendance0').toggleClass('vertical');
      });
    });
    </script>
    <script>
    $(document).ready(function(){
      $('.expansion_link1').click(function () {
        $('.attendance1').toggleClass('vertical');
      });
    });
    </script>
    <script>
    $(document).ready(function(){
      $('.expansion_link2').click(function () {
        $('.attendance2').toggleClass('vertical');
      });
    });
    </script>
    <script>
    $(document).ready(function(){
      $('.expansion_link3').click(function () {
        $('.attendance3').toggleClass('vertical');
      });
    });
    </script>
    <script>
    $(document).ready(function(){
      $('.expansion_link4').click(function () {
        $('.attendance4').toggleClass('vertical');
      });
    });
    </script>
    <script>
    $(document).ready(function(){
      $('.expansion_link5').click(function () {
        $('.attendance5').toggleClass('vertical');
      });
    });
    </script>
    <script>
    $(document).ready(function(){
      $('.expansion_link6').click(function () {
        $('.attendance6').toggleClass('vertical');
      });
    });
    </script>
    <script>
    $(document).ready(function(){
      $('.expansion_link7').click(function () {
        $('.attendance7').toggleClass('vertical');
      });
    });
    </script>
    <script>
    $(document).ready(function(){
      $('.expansion_link8').click(function () {
        $('.attendance8').toggleClass('vertical');
      });
    });
    </script>
    <script>
    $(document).ready(function(){
      $('.expansion_link9').click(function () {
        $('.attendance9').toggleClass('vertical');
      });
    });
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
