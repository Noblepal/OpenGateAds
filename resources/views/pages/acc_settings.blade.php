@extends('pages.user_dashboard')

@section('breadcrumb')
    <div class="page-header" style="background: url({{asset('assets/img/banner1.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">Profile Settings</h2>
                        <ol class="breadcrumb">
                            <li><a href="#">Home /</a></li>
                            <li class="current">Profile Settings</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('user_content')


    <div id="content" class="section-padding">
        <div class="container">
            <div class="row">
                @include('layouts.user_sidebar')
                <div class="col-sm-12 col-md-8 col-lg-9">
                    <div class="row page-content">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="inner-box">
                                <div class="dashboard-box">
                                    <h2 class="dashbord-title">Profile update</h2>
                                </div>

                                <div class="dashboard-wrapper">

                                    <form id="profileForm">
                                        @csrf
                                        <div id="overlay-load" style="display:none;" class="loadoverlay">
                                            <img src="{{url('/assets/img/loading.gif')}}" alt="loader">
                                            <br>
                                            updating...
                                        </div>
                                        <center style="margin-top:20px;"><span id="form_results"></span></center>
                                        <div class="form-group mb-3">
                                            <label class="control-label">First Name</label>
                                            <input class="form-control input-md" name="f_name" placeholder="First name"
                                                   type="text" required value="{{$user->fname}}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="control-label">Last Name</label>
                                            <input class="form-control input-md" name="l_name" placeholder="Last name"
                                                   type="text" required value="{{$user->lname}}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="control-label">Contact Phone</label>
                                            <input class="form-control input-md" name="phone" placeholder="Your phone"
                                                   type="text" required value="{{$user->phone}}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="control-label">Email</label>
                                            <input class="form-control input-md" name="" placeholder="Your email"
                                                   type="text" disabled value="{{$user->email}}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="control-label">Profile Logo</label>
                                            <input class="form-control input-md" name="profile_picture"
                                                   type="file" accept="image/*">
                                            <h6 class="mt-30">Security update (optional)</h6>
                                            <div class="form-group mb-3">
                                                <label class="control-label">Password</label>
                                                <input class="form-control input-md" name="password" placeholder="Password"
                                                       type="password" >
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="control-label">Confirm Password</label>
                                                <input class="form-control input-md" name="confirm-password" placeholder="Repeat password"
                                                       type="password">
                                            </div>

                                        <button type="submit" class="btn btn-common" type="button">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        // $(document).ready(function () {


        $("#profileForm").on("submit", function (e) {
            e.preventDefault(),
                $(".loadoverlay").fadeIn();
            $.ajax({
                url: "{{route('updateProfile')}}",
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
                        $('#profileForm')[0].reset();
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


        // });


    </script>

@endsection
