<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }}>

    <!-- Main Css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <!-- Main Js -->
    <script src="{{ asset('js/main.js') }}"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">

    <title>Watchfly - Watch Movies and Series For Free With No Limit</title>
</head>
<body>
    <div id="app">
        <nav style="background: #283144" class="navbar navbar-expand-md shadow-sm">
            <div class="container">
                <a class="navbar-brand text-light" href="{{ url('/') }}">
                    <img class="img-fluid logo" src="https://fontmeme.com/permalink/201015/c2078d0e3dc167c7391e439f3c3e679a.png" alt="Watchfly Logo" border="0">
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
                        @auth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endauth
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa fa-user"></i> My Account
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="/login" class="dropdown-item">
                                    Login
                                </a>
                                <a href="/register" class="dropdown-item">
                                    Register
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <div class="container-fluid border-top bg-dark-blue marginTop">
        <div class="container">
            <br><br>
            <p class="text-center text-light">Made with <span class="text-danger">♥</span> by <a href="https://github.com/hbakouane" class="font-weight-bolder">hbakouane</a></p>
            <br>
        </div>
    </div>

    <!-- Main Js -->
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- Bootstrap Js -->
    <script src={{ asset('js/bootstrap.min.js') }}></script>
</body>
</html>
