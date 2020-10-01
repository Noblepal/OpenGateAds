@extends('pages.user_dashboard')

@section('breadcrumb')
    <div class="page-header" style="background: url({{asset('assets/img/banner1.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">Dashboard</h2>
                        <ol class="breadcrumb">
                            <li><a href="#">Home /</a></li>
                            <li class="current">Dashboard</li>
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
                    <div class="page-content">
                        <div class="inner-box">
                            <div class="dashboard-box">
                                <h2 class="dashbord-title">Dashboard</h2>
                            </div>
                            <div class="dashboard-wrapper">
                                <div class="dashboard-sections">
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                                            <div class="dashboardbox">
                                                <div class="icon no-display "><i class="lni-write"></i></div>
                                                <div class="contentbox">
                                                    <h2><a href="#">Total Ad Posted</a></h2>
                                                    <h3>{{$total_ads}} Ad Posted</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                                            <div class="dashboardbox">
                                                <div class="icon no-display "><i class="lni-add-files"></i></div>
                                                <div class="contentbox">
                                                    <h2><a href="#">Featured Ads</a></h2>
                                                    <h3>{{$total_featured_ads}} Ad Posted</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                                            <div class="dashboardbox">
                                                <div class="icon no-display "><i class="lni-heart-filled"></i></div>
                                                <div class="contentbox">
                                                    <h2><a href="#">Favorite Ads</a></h2>
                                                    <h3>{{$total_fav_ads}}  Favorites Ads</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
