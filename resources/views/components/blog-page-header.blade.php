<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Cool Tech</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <style>
                #mainNav .navbar-nav > li.nav-item > a.active{
        color: yellowgreen;
    }
        </style>
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="{{ url('/') }}">Cool Tech</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4 {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4 {{ Request::routeIs('categorypage') ? 'active' : '' }}" href="{{ url('/category') }}">Categories</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4 {{ Request::routeIs('tagpage') ? 'active' : '' }}" href="{{ url('/tag') }}">Tags</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4 {{ Request::routeIs('aboutpage') ? 'active' : '' }}" href="{{ url('/about') }}">About</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4 {{ Request::routeIs('legalpage') ? 'active' : '' }}" href="{{ url('/legal') }}">Legal</a></li>
                        
                    @if (Route::has('login'))
                    @auth
                        <li class="nav-item"><ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 px-lg-3 py-3 py-lg-3">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#!">My Posts</a></li>
                                    <li><a class="dropdown-item" href="{{ route('home') }}">Dashboard</a></li>
                                    <li><hr class="dropdown-divider" /></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item">
                    <a class="nav-link px-lg-3 py-3 py-lg-4"  href="{{ route('login') }}">Login</a>
                    </li>

                        @if (Route::has('register'))
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"  href="{{ route('register') }}">Register</a></li>
                        @endif
                    @endauth
                </div>
            @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Header-->