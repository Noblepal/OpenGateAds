<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>OpenGate - Classified Ads and Listing Website</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/line-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slicknav.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/color-switcher.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">

</head>

<body>

    @include('includes.header')

    <div class="error section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="error-content">
                        <div class="error-message">
                            <h2>404</h2>
                            <h3>We're sorry, but we can't find the page you were looking for.</h3>
                            <p>It's probably some thing we've done wrong but now we know about it and we'll try to fix
                                it. In the meantime, try one of these options</p>
                        </div>
                        <form class="form-error-search">
                            <input type="search" name="search" class="form-control" placeholder="Search Here">
                            <button class="btn btn-common btn-search" type="button">Search Now</button>
                        </form>
                        <div class="description">
                            <span>Or Goto <a href="#">Homepage</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('includes.footer')


    <a href="#" class="back-to-top">
        <i class="lni-chevron-up"></i>
    </a>

    <div id="preloader">
        <div class="loader" id="loader-1"></div>
    </div>


    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('assets/js/jquery-min.js ') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/color-switcher.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/form-validator.min.js') }}"></script>
    <script src="{{ asset('assets/js/contact-form-script.min.js') }}"></script>
    <script src="{{ asset('assets/js/summernote.js') }}"></script>
</body>

</html>
