<header id="header-wrap">

    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-xs-12">

                    <ul class="list-inline">
                        <li class="header-top-button"><i class="lni-phone"></i> +0123 456 789</li>
                        <li class="header-top-button"><i class="lni-envelope"></i> <a
                                href="mailto:info@mobharvesters.net">info@mobharvesters.net</a></li>
                    </ul>

                </div>

                @if (Route::has('login'))
                    @auth
                        {{-- Todo --}}
                    @else
                        <div class="col-lg-5 col-md-7 col-xs-12">
                            <div class="header-top-right float-right">
                                <a href="/login" class="header-top-button"><i class="lni-lock"></i> Log In</a> |
                                <a href="/register" class="header-top-button"><i class="lni-pencil"></i> Register</a>
                            </div>
                        </div>
                    @endif
                    @endif

                </div>
            </div>
        </div>


        <nav class="navbar navbar-expand-lg bg-white fixed-top scrolling-navbar">
            <div class="container">

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
                        <li class="nav-item">
                            <a class="nav-link" href="/">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/categories">
                                Categories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/listings">Listings</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/contact">
                                Contact
                            </a>
                        </li>
                    </ul>
                    <div class="post-btn">
                        <a class="btn btn-common" href="/ad-post"><i class="lni-pencil-alt"></i> Post an Ad</a>
                    </div>
                </div>
            </div>

            <ul class="mobile-menu">
                <div class="post-btn">
                    <a class="btn btn-common" href="/ad-post"><i class="lni-pencil-alt"></i> Post an Ad</a>
                </div>
                <li><a href="/">Home</a></li>
                <li>
                    <a href="/categories">Categories</a>
                </li>
                <li>
                    <a href="/listings">Listings</a>
                </li>

                <li>
                    <a href="/contact">Contact Us</a>
                </li>

                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            {{-- Todo --}}
                        @else
                            <li>
                                <a href="{{ route('login') }}"><i class="lni-lock"></i> Log In</a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}"><i class="lni-pencil"></i> Register</a>
                                </li>
                            @endif



                    @endif
                    </div>
                    @endif



                </ul>


            </nav>
        </header>
