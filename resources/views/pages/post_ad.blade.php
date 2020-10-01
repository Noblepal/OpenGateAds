@extends('pages.user_dashboard')

@section('breadcrumb')
    <div class="page-header" style="background: url({{asset('assets/img/banner1.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">Post your Ad</h2>
                        <ol class="breadcrumb">
                            <li><a href="#">Home /</a></li>
                            <li class="current">Post your Ad</li>
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
                                    <h2 class="dashbord-title">Ad Detail</h2>
                                </div>

                                <div class="dashboard-wrapper">

                                    <form id="addForm">
                                        @csrf
                                        <div id="overlay-load" style="display:none;" class="loadoverlay">
                                            <img src="{{url('/assets/img/loading.gif')}}" alt="loader">
                                            <br>
                                            posting...
                                        </div>
                                        <center style="margin-top:20px;"><span id="form_results"></span></center>
                                        <div class="form-group mb-3">
                                            <label class="control-label">Project Title</label>
                                            <input class="form-control input-md" name="title" placeholder="Title"
                                                   type="text" required>
                                        </div>
                                        <div class="form-group mb-3 tg-inputwithicon">
                                            <label class="control-label">Categories</label>
                                            <div class="tg-select form-control">
                                                <select name="category" required id="category">
                                                    <option value="" selected disabled>Select Categories</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 tg-inputwithicon">
                                            <label class="control-label">Location</label>
                                            <div class="tg-select form-control">
                                                <select name="county" required id="county">
                                                    <option value="" selected disabled>Select Location for Your Ad
                                                    </option>
                                                    @foreach($counties as $county)
                                                        <option value="{{$county->name}}">{{$county->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="control-label">Price</label>
                                            <input class="form-control input-md" name="price"
                                                   placeholder="Ad your Price"
                                                   type="text" required>
                                        </div>
                                        <div class="form-group md-3">
                                            <label class="control-label">Description</label>
                                            <textarea id="summernote" cols="30" rows="5" name="desc" required>

                                        </textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="control-label">Main Image</label>
                                            <input class="form-control input-md" name="main_image"
                                                   type="file" accept="image/*" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="control-label">Gallery Images (optional)</label>
                                            <input class="form-control input-md" name="gallery[]"
                                                   type="file" multiple accept="image/*">
                                        </div>
                                        <button type="submit" class="btn btn-common" type="button">Post Ad</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/plugins/summernote/dist/summernote-bs4.min.js') }}"></script>


    <script>
        $('#summernote').summernote({
            height: 250, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false, // set focus to editable area after initializing summernote
            tabsize: 2
        });
    </script>

    <script>
        // $(document).ready(function () {


        $("#addForm").on("submit", function (e) {
            e.preventDefault(),
                $(".loadoverlay").fadeIn();
            $.ajax({
                url: "{{route('uploadPost')}}",
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
                        $('#addForm')[0].reset();
                        Lobibox.notify("success", {
                            pauseDelayOnHover: true,
                            continueDelayOnInactiveTab: false,
                            position: "top right",
                            icon: "fa fa-check-circle",
                            msg: data.success,
                        });
                        setTimeout(function () {
                            $("#form_results").html("");

                        }, 2000);
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
