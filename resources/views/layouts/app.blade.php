<?php
header('Access-Control-Allow-Headers: Accept, Accept-Encoding, Accept-Language, Authorization, Cache-Control, Pragma, Content-Type, Origin, Referer, Sec-Fetch-Dest, Sec-Fetch-Mode, Sec-Fetch-Site, User-Agent, X-Requested-With');
header('Cache-Control "no-cache"');
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Places') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/control.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/components.css')}}" rel="stylesheet">
    <link href="{{asset('fontawesome/css/all.css')}}" rel="stylesheet">
</head>
<noscript>
    <meta http-equiv="refresh" content="0; url={{ route('404_PAGE') }}" />
</noscript>
<header>
    <nav class="py-2 navbar navbar-expand-lg navbar-dark sticky-top navbar-theme">
        <div id="container" class="container-fluid">
            <a class="brand logo-font" href="{{ url('/') }}">
                <i class="fab fa-blogger" style="font-size: 50px;"></i>
            </a>
            @auth
                <div class="d-flex order-lg-1">
                    <ul class="navbar-nav flex-row">
                        <div class="dropdown order-last" id="navbarDropdownMenuLink" data-toggle="collapse" data-target="#account" aria-controls="navbarResponsive" aria-haspopup="true"
                             aria-expanded="false" aria-label="Toggle navigation">
                            <img class="ml-auto" src="/uploads/avatars/{{Auth::user()->avatar}}" style="
                                    width: 25px; border-radius: 30%;
                                    height: 25px;">
                        </div>
                    </ul>
                </div>

                <div class="dropdown-menu account box-shadow dropdown-menu-right mx-3" id="account" data-parent="#container">
                    <ul class="nav-link" aria-labelledby="navbarDropdownMenuLink">
                        <div class="row contain">
                            <div class="col-3">
                                <img class="ml-auto" src="/uploads/avatars/{{Auth::user()->avatar}}" style="
                                    width: 70px;
                                    height: 70px; border-radius: 50%">
                            </div>
                            <div class="row-cols-1" style="
                                    margin-top: 5px; font-size: 18px; font-weight: bold; margin-left: 22px">
                                {{ Auth::user()->name }}

                                <div class="w-25"></div>
                                <div class="row-cols-1" style="
                                        font-weight: normal; color: gray;
                                        font-size: 14px; margin-top: 7px; margin-bottom: 15px;">
                                    {{ Auth::user()->email }}
                                </div>

                                <div class="w-25"></div>
                                <div class="row-cols-1" style="
                                        font-weight: normal; color: gray;
                                        font-size: 14px; margin-top: 10px;">
                                    <a style="border-bottom: 1px solid black"> View account</a>
                                </div>
                            </div>
                        </div>
                        <hr class="my-2"style="transform: translateY(13px)!important;">

                        </hr>
                        <a class="dropdown-item">
                            <a class="nav-link login" href="{{ route('logout') }}" style="font-size: 14px !important;"onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </div>
            @endauth

            @guest
                <div class="d-flex order-lg-1">
                    <ul class="navbar-nav flex-row">
                        <button id="guest" class="btn btn-outline-danger dropdown account order-last">
                            <i class="fa fa-user"></i>
                        </button>
                    </ul>
                </div>
        @endguest


        <!-- links toggle -->
            <button class="navbar-toggler order-first" type="button" data-toggle="collapse" data-target="#links"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="links" data-parent="#container">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item active">
                        <a class="nav-link mx-3 text-green" style="font-size: 17px" href="#">
                            <i class="fa fa-calendar-star mx-2" style="font-size: 20px; display: inline-block; transform:translateY(-0.5px)"></i>
                            Event
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3 text-green" style="font-size: 17px" href="#">
                            <i class="fa fa-album-collection mx-2" style="font-size: 20px; display: inline-block; transform:translateY(-0.5px)"></i>
                            Collections
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link mx-3 text-green" style="font-size: 17px" href="#">
                            <i class="fa fa-photo-video mx-2" style="font-size: 20px; display: inline-block; transform:translateY(-0.5px)"></i>
                            Medias
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link mx-3 text-green" style="font-size: 17px" href="#">
                            <i class="fa fa-life-ring mx-2" style="font-size: 20px; display: inline-block; transform:translateY(-0.5px)"></i>
                            Support
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3 text-green" style="font-size: 17px" href="#">
                            <i class="fa fa-plus-circle mx-2" style="font-size: 20px; display: inline-block; transform:translateY(-0.5px)"></i>
                            Other
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<body>
    @yield('content')
</body>
</html>
