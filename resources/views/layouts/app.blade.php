<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-109853110-5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-109853110-5');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Wander Team">
    <meta name="description" content="Realtime chat app using Laravel, VueJS, Redis, Laravel Echo, SocketIO">
    <meta name="keywords" content="Realtime chat app, Laravel, VueJS, Laravel Echo, Redis, SocketIO">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/5a4cc57f3e.js"></script>

    <title>Realtime Chat | Laravel, VueJS, Redis, Laravel Echo, SocketIO</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,700,700i&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css"
          integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('/css/custom.css') }}" crossorigin="anonymous">


</head>
<body>
<div id="app">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img
                    src="https://res.cloudinary.com/vernom/image/upload/v1639377635/realtime_chat_app/page_bg/output-onlinegiftools_dyrqhz.gif"
                    alt="logo">
                <h2 class="ml-2 mb-0" style="font-weight: 400; color: deeppink">WANDERLUST</h2>
            </a>
            <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
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
                            <a class="nav-link cyber-btn login-cyber-btn"
                               href="{{ route('login') }}">{{ __('Login') }}<span aria-hidden="true">_</span>
                                <span aria-hidden="true" class="cyber-btn__glitch login-cyber-btn__glitch">Login_</span>
                                <span aria-hidden="true" class="cyber-btn__tag">V11</span>
                            </a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link cyber-btn register-cyber-btn"
                                   href="{{ route('register') }}">{{ __('Register') }}<span
                                        aria-hidden="true">_</span>
                                    <span aria-hidden="true" class="cyber-btn__glitch register-cyber-btn__glitch">Register_</span>
                                    <span aria-hidden="true" class="cyber-btn__tag">V11</span>
                                </a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                               style="color: aqua">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                                 style="background-color: rgba(255,255,255,0.2)">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                   style="color: deeppink">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <main class="py-4" style="">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center text-white footer-position">
        <!-- Copyright -->
        <div class="text-center p-2 text-copyright">
            Background gif from <a href="https://radio.x-team.com/"><strong style="color: aqua">X-TEAM</strong></a> / ©
            2021 Copyright:
            <a href="https://www.instagram.com/ver.nom/"><span style="text-decoration: underline">VER.NOM</span></a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js"
        integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P"
        crossorigin="anonymous"></script>
</body>
</html>
