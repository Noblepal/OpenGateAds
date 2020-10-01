<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Classified Ads and Listing Website">
    <meta name="author" content="Eric & Joseph">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>OpenGate - Classified Ads and Listing Website</title>

    <link href="{{ asset('assets/plugins/fontawesome-free-5.14.0-web/css/all.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/line-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slicknav.css') }}">
    {{--    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/color-switcher.css') }}">--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
    <!-- notifications css -->
    <link rel="stylesheet" href="{{asset('assets/plugins/notifications/css/lobibox.min.css')}}"/>

    <script src="{{ asset('assets/js/jquery-min.js ') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
{{--    <script src="{{asset('assets/js/ajax.js')}}/"></script>--}}
<!--Select Plugins Js-->
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
</head>

<body>

{{-- @if ($no_header ?? '')

    @include('includes.header-no-banner')
@else
@include('includes.header')
@endif --}}
@include('includes.header')
@yield('content')

@include('includes.footer')

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<a href="#" class="back-to-top">
    <i class="lni-chevron-up"></i>
</a>

<div id="preloader">
    <div class="loader" id="loader-1"></div>
</div>


<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" id="login-form">
                @csrf
            <div class="modal-body">
                    <div id="overlay-load" style="display:none;" class="loadoverlay">
                        <img src="{{url('/assets/img/loading.gif')}}" alt="loader">
                        <br>
                        login...
                    </div>
                    <center style="margin-top:20px;"><span id="form_results"></span></center>
                    <div class="form-group">
                        <div class="input-icon">
                            <i class="lni-user"></i>
                            <input type="email" id="sender-email"
                                   class="form-control @error('email') is-invalid @enderror" name="email"
                                   value="{{ old('email') }}" required autocomplete="email" autofocus
                                   placeholder="Email Address">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-icon">
                            <i class="lni-lock"></i>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   name="password"
                                   required autocomplete="current-password" placeholder="Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="checkedall" name="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="checkedall">Keep me logged in</label>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
            </form>
        </div>
    </div>
</div>


{{--    <script src="{{ asset('assets/js/color-switcher.js') }}"></script>--}}
<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/js/wow.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/form-validator.min.js') }}"></script>
<script src="{{ asset('assets/js/contact-form-script.min.js') }}"></script>

<!--notification js -->
<script src="{{asset('assets/plugins/notifications/js/lobibox.min.js')}}"></script>
<script src="{{asset('assets/plugins/notifications/js/notifications.min.js')}}"></script>
<script src="{{asset('assets/plugins/notifications/js/notification-custom-script.js')}}"></script>

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $(document).on('click', '.not-favorite, .favorite', function () {

            var e = $(this).data("id");
            var s = $(this);
            var a = $(this).attr("class");

            if (a == "icon not-favorite") {
                $(s).removeClass("not-favorite");
                $(s).addClass("favorite");

            } else if (a == "icon favorite") {
                $(s).removeClass("favorite");
                $(s).addClass("not-favorite");
            }
            $.ajax({
                type: "POST",
                url: "{{route('favoriteAd')}}",
                data: {id: e},
                success: function (e) {
                    // jQuery.isEmptyObject(e.success.attached);
                    Lobibox.notify("success", {
                        pauseDelayOnHover: true,
                        continueDelayOnInactiveTab: false,
                        position: "top right",
                        icon: "fa fa-check-circle",
                        msg: e.success,
                    });
                },
            });

        });

        $(document).on('click', '.require-login', function () {
            $("#loginModal").modal("show");
        });

        $("#login-form").on("submit", function (e) {
            e.preventDefault(),
                $(".loadoverlay").fadeIn();
            $.ajax({
                url: "{{route('ajaxLogin')}}",
                method: "post",
                data: new FormData(this),
                contentType: !1,
                cache: !1,
                processData: !1,
                dataType: "json",
                success: function (data) {
                    $(".loadoverlay").fadeOut();
                    var html = "";
                    if (data.errors) {
                        html =
                            '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" \
                        data-dismiss="alert">&times;</button><div class="alert-icon"><i class="icon-close"></i></div><div class="alert-message">\
                        <span><strong>Errors!</strong></span><br>';
                        for (
                            var count = 0;
                            count < data.errors.length;
                            count++
                        ) {
                            html +=
                                "<span>" +
                                data.errors[count] +
                                "</span><br>";
                            Lobibox.notify("error", {
                                pauseDelayOnHover: true,
                                continueDelayOnInactiveTab: false,
                                position: "top right",
                                icon: "fa fa-times-circle",
                                msg: data.errors[count],
                            });
                        }
                        html += "</div></div>";
                    }
                    if (data.error) {
                        html =
                            '<div class="alert alert-warning">' +
                            data.error +
                            "</div>";
                        Lobibox.notify("error", {
                            pauseDelayOnHover: true,
                            continueDelayOnInactiveTab: false,
                            position: "top right",
                            icon: "fa fa-times-circle",
                            msg: data.error,
                        });
                    }
                    if (data.success) {
                        html =
                            '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" \
                        data-dismiss="alert">&times;</button><div class="alert-icon"><i class="icon-check"></i></div><div class="alert-message">\
                        <span><strong>Success!</strong> ' +
                            data.success +
                            "</span></div></div>";

                        $("#form_results").html(html);
                        $('#login-form')[0].reset();
                        Lobibox.notify("success", {
                            pauseDelayOnHover: true,
                            continueDelayOnInactiveTab: false,
                            position: "top right",
                            icon: "fa fa-check-circle",
                            msg: data.success,
                        });
                        setTimeout(function () {
                            $("#form_results").html("");
                            location.reload();
                        }, 1000);
                    }

                    $("#form_results").html(html);

                },
                error: function (data) {
                    $(".loadoverlay").fadeOut();
                    console.log(data);
                    Lobibox.notify("error", {
                        pauseDelayOnHover: true,
                        continueDelayOnInactiveTab: false,
                        position: "top right",
                        icon: "fa fa-times-circle",
                        msg: "Something went wrong",
                    });

                },
            });
        });

    });
</script>


</body>


</html>
