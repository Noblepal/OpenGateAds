<header id="header-wrap">

    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-xs-12">

                    <ul class="list-inline">
                        <li class="header-top-button">{{-- <i class="lni-phone"> --}}</i> +254 712345678</li>
                        <li class="header-top-button">{{-- <i class="lni-envelope"> --}}</i> <a
                                href="mailto:info@mobharvesters.net">info@mobharvesters.net</a></li>
                    </ul>

                </div>

                @if (Route::has('login'))
                    @auth
                        {{-- Todo --}}
                    @else
                        <div class="col-lg-5 col-md-7 col-xs-12">
                            <div class="header-top-right float-right">
                                <a href="/login" class="header-top-button">{{-- <i class="lni-lock"></i> --}} Log In</a> |
                                <a href="/register" class="header-top-button">{{-- <i class="lni-pencil"></i> --}} Register</a>
                            </div>
                        </div>
                    @endif
                @endif

            </div>
        </div>
    </div>


    <nav class="navbar navbar-expand-lg bg-white fixed-top scrolling-navbar">
        <div class="container-fluid">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar"
                        aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="lni-menu"></span>
                    <span class="lni-menu"></span>
                    <span class="lni-menu"></span>
                </button>
                <a href="/" class="navbar-brand"><img src="{{ asset('assets/img/logo-small.png') }}" alt=""></a>
            </div>
            <div class="collapse navbar-collapse" id="main-navbar">
                <ul class="navbar-nav mr-auto w-100 justify-content-center">
                    <li class="nav-item {{ Route::currentRouteNamed('index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('index')}}">
                            Home
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed('categories') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('categories')}}">
                            Categories
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed('listings') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('listings')}}">Listings</a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed('rejected') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('rejected')}}">Rejected Adverts</a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed('missed') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('missed')}}">Missed Adverts</a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed('contact') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('contact')}}">
                            Contact
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed('about') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('about')}}">
                            About
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                           Account
                        </a>
                        <div class="dropdown-menu">
                            @if(Auth::check())
                                <a class="dropdown-item" href="{{route('dashboard')}}"><i class="lni-user">
                                    </i> {{Auth::user()->fname.' '.Auth::user()->lname}}</a>
                            @else
                                <a class="dropdown-item" href="{{route('login')}}"> Login</a>
                            @endif
                            <a class="dropdown-item" href="{{route('dashboard')}}">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>
                        </div>
                    </li>
                </ul>
                <div class="post-btn">
                    <a class="btn btn-common" href="/ad-post">{{-- <i class="lni-pencil-alt"> --}}</i>  Post Ads</a>
                </div>
            </div>
        </div>

        <ul class="mobile-menu">
            <div class="post-btn">
                <a class="btn btn-common" href="/ad-post">{{-- <i class="lni-pencil-alt"> --}}</i> Post Ads</a>
            </div>
            <li><a href="{{route('index')}}">Home</a></li>
            <li>
                <a href="{{route('categories')}}">Categories</a>
            </li>
            <li>
                <a href="{{route('listings')}}">Listings</a>
            </li>
            <li>
                <a href="{{route('rejected')}}">Rejected Adverts</a>
            </li>

            <li>
                <a href="{{route('contact')}}">Contact Us</a>
            </li>
            <li>
                <a href="{{route('about')}}">About Us</a>
            </li>

            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{route('dashboard')}}"><i class="lni-user">
                            </i> {{Auth::user()->fname.' '.Auth::user()->lname}}</a>
                    @else
                        <li>
                            <a href="{{ route('login') }}">{{-- <i class="lni-lock"></i> --}} Log In</a>
                        </li>
                        @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}">{{-- <i class="lni-pencil"> --}}</i> Register</a>
                            </li>
                        @endif



                    @endif
                </div>
            @endif


        </ul>


    </nav>
</header>
