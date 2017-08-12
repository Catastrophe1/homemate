<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Homemate') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <style>
        .jumbotron{
            background-color: #6E60B6;
            color: white;
            margin-top: 0;
            margin-bottom: 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <img src="{{ asset('images/homemate.png') }}"  style="width: 32px; height: 32px; position: absolute; top: 8px; left: 28px">
                    <a class="navbar-brand" style="position: absolute; top: 1px; left: 75px">
                        {{ config('app.name', 'Homemate') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="position: relative; padding-left: 50px">
                                    <img src="{{ asset('storage/avatars/'.Auth::user()->avatar) }}" 
                                         class="img-circle" alt="avt"
                                         style="width: 32px; hight: 32px; position: absolute; top: 10px; left: 10px">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/profile') }}">
                                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                            &nbsp;&nbsp;Profile
                                        </a>

                                        <form id="profile-form" action="{{ url('/profile') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li>
                                        <a href="{{ url('/settings') }}">
                                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                                            &nbsp;&nbsp;Settings
                                        </a>

                                        <form id="settings-form" action="{{ url('/settings') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                                            &nbsp;&nbsp;Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>  
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

