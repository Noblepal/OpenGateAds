@extends('layouts.app')

@section('content')
    <div class="page-header" style="background: url({{asset('assets/img/banner1.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">Browse {{$header}}</h2>
                        <ol class="breadcrumb">
                            <li><a href="/">Home /</a></li>
                            <li class="current">Browse {{$header}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="main-container section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-xs-12 page-sidebar">
                    <aside>

                        <div class="widget_search">
                            <form role="search" id="search-form">
                                <input type="search" class="form-control" autocomplete="off" name="s"
                                       placeholder="Search..." id="search-input" value="">
                                <button type="submit" id="search-submit" class="search-btn"><i
                                        class="lni-search"></i></button>
                            </form>
                        </div>

                        <div class="widget categories">
                            <h4 class="widget-title">All Categories</h4>
                            <ul class="categories-list">
                                @foreach($categories as $category)
                                    <li class="{{ Request::path() ==('category/'.$category->id.'/listings') ? 'active' : '' }}">
                                        <a href="{{route('categoryListings',$category->id)}}">
                                            <i class="{{$category->icon_name}}"></i>
                                            {{$category->name}} <span class="category-counter">({{$category->ads_count}})</span>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">Advertisement</h4>
                            <div class="add-box">
                                <img class="img-fluid" src="/assets/img/img1.jpg" alt="">
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-9 col-md-12 col-xs-12 page-content">

                    <div class="product-filter">
                        <div class="short-name">
                            <span>Showing (1 - 12 products of 7371 products)</span>
                        </div>
                        <div class="Show-item">
                            <span>Show Items</span>
                            <form class="woocommerce-ordering" method="post">
                                <label>
                                    <select name="order" class="orderby">
                                        <option selected="selected" value="menu-order">49 items</option>
                                        <option value="popularity">popularity</option>
                                        <option value="popularity">Average ration</option>
                                        <option value="popularity">newness</option>
                                        <option value="popularity">price</option>
                                    </select>
                                </label>
                            </form>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#grid-view"><i class="lni-grid"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#list-view"><i class="lni-list"></i></a>
                            </li>
                        </ul>
                    </div>

                    <div class="adds-wrapper">
                        @if($ads->isEmpty())
                            <div class="text-center"><h2>No Ads found!</h2></div>
                        @else
                            <div class="tab-content">
                                <div id="grid-view" class="tab-pane fade">
                                    <div class="row">
                                        @foreach($ads as $ad)
                                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                <div class="featured-box">
                                                    <figure>
                                                        @if(Auth::check())
                                                            @if($user->hasFavorited($ad))
                                                                <div class="icon favorite" data-id="{{ $ad->id }}">
                                                                    <span><i class="lni-heart"></i></span>
                                                                </div>
                                                            @else
                                                                <div class="icon not-favorite" data-id="{{ $ad->id }}">
                                                                    <span><i class="lni-heart"></i></span>
                                                                </div>
                                                            @endif
                                                        @else
                                                            <div class="icon require-login">
                                                                <span><i class="lni-heart"></i></span>
                                                            </div>
                                                        @endif

                                                        <a href="{{route('adDetails',$ad->id)}}"><img class="img-fluid"
                                                                                                      src="{{url('/openGateAds').'/'.$ad->photos->where('type','main_image')->pluck('image_path')->first()}}"
                                                                                                      alt="ad photo"></a>
                                                    </figure>
                                                    <div class="feature-content">
                                                        <h4><a href="{{route('adDetails',$ad->id)}}">{{$ad->title}}</a>
                                                        </h4>
                                                        <div class="meta-tag">
                                <span>
                                    <a href="{{route('sellerListings',$ad->user->id)}}"><i class="lni-user"></i>{{$ad->user->fname.' '.$ad->user->lname}}</a>
                                </span>
                                                            <span>
                                    <a href="{{route('locationListings',$ad->county)}}"><i class="lni-map-marker"></i> {{$ad->county}}</a>
                                </span>
                                                            <span>
                                    <a href="{{route('categoryListings',$ad->category->id)}}"><i class="lni-tag"></i> {{$ad->category->name}}</a>
                                </span>
                                                        </div>
                                                        <p class="dsc">{!! \Illuminate\Support\Str::limit($ad->description, 150, $end='...') !!}</p>
                                                        <div class="listing-bottom">
                                                            <h3 class="price float-left">
                                                                Ksh {{number_format($ad->price, 0)}}</h3>
                                                            <a href="{{route('adDetails',$ad->id)}}"
                                                               class="btn btn-common float-right">View Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach
                                    </div>
                                </div>
                                <div id="list-view" class="tab-pane fade active show">
                                    <div class="row">
                                        @foreach($ads as $ad)
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="featured-box">
                                                    <figure>

                                                        @if(Auth::check())
                                                            @if($user->hasFavorited($ad))
                                                                <div class="icon favorite" data-id="{{ $ad->id }}">
                                                                    <span><i class="lni-heart"></i></span>
                                                                </div>
                                                            @else
                                                                <div class="icon not-favorite" data-id="{{ $ad->id }}">
                                                                    <span><i class="lni-heart"></i></span>
                                                                </div>
                                                            @endif
                                                        @else
                                                            <div class="icon require-login">
                                                                <span><i class="lni-heart"></i></span>
                                                            </div>
                                                        @endif
                                                        <a href="{{route('adDetails',$ad->id)}}"><img class="img-fluid"
                                                                                                      src="{{url('/openGateAds').'/'.$ad->photos->where('type','main_image')->pluck('image_path')->first()}}"
                                                                                                      alt="ad photo"></a>
                                                    </figure>
                                                    <div class="feature-content">
                                                        <h4><a href="{{route('adDetails',$ad->id)}}">{{$ad->title}}</a>
                                                        </h4>
                                                        <div class="meta-tag">
                                                    <span>
                                                        <a href="{{route('sellerListings',$ad->user->id)}}"><i
                                                                class="lni-user"></i> {{$ad->user->fname.' '.$ad->user->lname}}</a>
                                                    </span>
                                                            <span>
                                                        <a href="{{route('locationListings',$ad->county)}}"><i
                                                                class="lni-map-marker"></i> {{$ad->county}}</a>
                                                    </span>
                                                            <span>
                                                        <a href="{{route('categoryListings',$ad->category->id)}}"><i
                                                                class="lni-tag"></i> {{$ad->category->name}}</a>
                                                    </span>
                                                        </div>
                                                        <p class="dsc">{!! \Illuminate\Support\Str::limit($ad->description, 150, $end='...') !!}</p>
                                                        <div class="listing-bottom">
                                                            <h3 class="price float-left">
                                                                Ksh {{number_format($ad->price, 0)}}</h3>
                                                            <a href="{{route('adDetails',$ad->id)}}"
                                                               class="btn btn-common float-right">View
                                                                Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>


                    <div class="pagination-bar">

                        <nav>
                            {{ $ads->links('vendor.pagination.custom_paginate') }}

                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection
