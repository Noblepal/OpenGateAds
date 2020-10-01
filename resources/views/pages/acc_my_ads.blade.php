@extends('pages.user_dashboard')

@section('breadcrumb')
    <div class="page-header" style="background: url({{asset('assets/img/banner1.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">My Ads</h2>
                        <ol class="breadcrumb">
                            <li><a href="#">Home /</a></li>
                            <li class="current">My Ads</li>
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
                                    <h2 class="dashbord-title">My Ads</h2>
                                </div>

                                <div class="dashboard-wrapper">
                                    <nav class="nav-table">
                                        <ul>
                                            <li class="active"><a href="#">Featured ({{$featured_count}})</a></li>
                                        </ul>
                                    </nav>
                                    <table class="table table-responsive dashboardtable tablemyads">
                                        <thead>
                                        <tr>
                                            <th>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="checkedall">
                                                    <label class="custom-control-label" for="checkedall"></label>
                                                </div>
                                            </th>
                                            <th>Photo</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Ad Status</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($ads as $ad)
                                            <tr data-category="{{$ad->is_active == 1 ? 'active' : 'inactive'}}">
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="adone">
                                                        <label class="custom-control-label" for="adone"></label>
                                                    </div>
                                                </td>
                                                <td class="photo"><img class="img-fluid"
                                                                       src="{{url('/openGateAds').'/'.$ad->photos->where('type','main_image')->pluck('image_path')->first()}}"
                                                                       alt="ad photo"></td>
                                                <td data-title="Title">
                                                    <h3>{{$ad->title}}</h3>
                                                </td>
                                                <td data-title="Category"><span
                                                        class="adcategories"> {{$ad->category->name}}</span></td>
                                                <td data-title="Ad Status"><span
                                                        class="adstatus adstatus{{$ad->is_active == 1 ? 'active' : 'inactive'}}">{{$ad->is_active == 1 ? 'active' : 'inactive'}}</span>
                                                </td>
                                                <td data-title="Price">
                                                    <h3>Ksh {{number_format($ad->price, 0)}}</h3>
                                                </td>
                                                <td data-title="Action">
                                                    <div class="btns-actions">
                                                        <a class="btn-action btn-edit"
                                                           href="{{route('editPost',$ad->id)}}"><i
                                                                class="lni-pencil"></i></a>
                                                        <a class="btn-action btn-delete"
                                                           onclick="deleteAd('{{$ad->id}}')"><i
                                                                class="lni-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>

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


        function deleteAd(ad_id) {
            var result = confirm("Want to delete?");
            if (result) {

                $.ajax({
                    url: '{{route('deletePost')}}',
                    method: 'Delete',
                    data: {
                        ad_id: ad_id,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function (data) {
                        if (data.errors) {
                            Lobibox.notify("error", {
                                pauseDelayOnHover: true,
                                continueDelayOnInactiveTab: false,
                                position: "bottom right",
                                icon: "fa fa-times-circle",
                                msg: data.errors,
                            });
                        }
                        if (data.error) {
                            Lobibox.notify("error", {
                                pauseDelayOnHover: true,
                                continueDelayOnInactiveTab: false,
                                position: "bottom right",
                                icon: "fa fa-check-circle", //path to image
                                msg: data.error,
                            });

                        }
                        if (data.success) {
                            Lobibox.notify("success", {
                                pauseDelayOnHover: true,
                                continueDelayOnInactiveTab: false,
                                position: "bottom right",
                                icon: "fa fa-check-circle", //path to image
                                msg: data.success,
                            });
                            location.reload();
                        }


                    },
                    error: function (data) {
                        Lobibox.notify("error", {
                            pauseDelayOnHover: true,
                            continueDelayOnInactiveTab: false,
                            position: "bottom right",
                            icon: "fa fa-times-circle",
                            msg: "Something went wrong",
                        });

                    },
                });
            }
        }



    </script>

@endsection
