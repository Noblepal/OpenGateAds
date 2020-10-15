@extends('layouts.app')

@section('content')
    <div id="hero-area">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-9 col-xs-12 text-center">
                    <div class="contents">
                        <h1 class="head-title"><span class="m-red">Best</span> <span class="m-green">Beehive</span> <span class="m-blue">Based</span> <span class="m-purple">Businesses</span></h1>
                        <p class="text-dark">Buy .. Sell .. Let .. Rent .. Hire .. Book</p>
                        <div class="search-bar">
                            <div class="search-inner">
                                <form class="search-form">
                                    <div class="form-group">
                                        <input type="text" name="customword" class="form-control"
                                            placeholder="What are you looking for?">
                                    </div>
                                    <div class="form-group inputwithicon">
                                        <div class="select">
                                            <select>
                                                <option value="" selected disabled>Locations</option>
                                                @foreach ($counties as $county)
                                                    <option value="{{ $county->name }}">{{ $county->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        {{-- <i class="lni-target"></i>
                                        --}}
                                    </div>
                                    <div class="form-group inputwithicon">
                                        <div class="select">
                                            <select>
                                                <option value="" selected disabled>Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        {{-- <i class="lni-menu"></i>
                                        --}}
                                    </div>
                                    <button class="btn btn-common" type="button">{{-- <i
                                            class="lni-search"> --}}</i> Search
                                        Now
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="categories">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-12 col-xs-12">
                    <div id="categories-icon-slider" class="categories-wrapper owl-carousel owl-theme">
                        @foreach ($categories as $category)
                            <div class="item">
                                <a href="{{ route('categoryListings', $category->id) }}">
                                    <div class="category-icon-item">
                                        <div class="icon-box">
                                            <div class="icon no-display ">
                                                {{-- <img
                                                    src="{{ asset('assets/img/category/img-1.png') }}"
                                                    alt="">--}}
                                                <span><i class="{{ $category->icon_name }}"></i></span>
                                            </div>
                                            <h4>{{ $category->name }}</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="featured section-padding">
        <div class="container">
            <h1 class="section-title">Latest Adverts</h1>
            <div class="row">
                @include('includes.list_item')
            </div>
        </div>
    </section>


    <section class="featured-lis section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 wow fadeIn" data-wow-delay="0.5s">
                    <h3 class="section-title">Featured Adverts</h3>
                    <div id="new-products" class="owl-carousel owl-theme">
                        @foreach ($featured_ads as $ad)

                            <div class="item">
                                <div class="product-item">
                                    <div class="carousel-thumb">
                                        <img class="img-fluid"
                                            src="{{ url('/openGateAds') .
                                                     '/' .
                                                     $ad->photos->where('type', 'main_image')->pluck('image_path')->first() }}"
                                            alt="ad photo">
                                        <div class="overlay">
                                            <div>
                                                <a class="btn btn-common" href="#">View Details</a>
                                            </div>
                                        </div>
                                        <div class="btn-product bg-sale">
                                            <a>Featured</a>
                                        </div>
                                        <span class="price">Ksh {{ number_format($ad->price, 0) }}</span>
                                    </div>
                                    <div class="product-content">
                                        <h3 class="product-title"><a href="#">{{ $ad->title }}</a></h3>
                                        <a
                                            href="{{ route('categoryListings', $ad->category->id) }}"><span>{{ $ad->category->name }}</span></a>
                                        @if (Auth::check())
                                            @if ($user->hasFavorited($ad))
                                                <div class="icon no-display favorite" data-id="{{ $ad->id }}">
                                                    <span><i class="lni-heart"></i></span>
                                                </div>
                                            @else
                                                <div class="icon no-display not-favorite" data-id="{{ $ad->id }}">
                                                    <span><i class="lni-heart"></i></span>
                                                </div>
                                            @endif
                                        @else
                                            <div class="icon no-display require-login">
                                                <span><i class="lni-heart"></i></span>
                                            </div>
                                        @endif
                                        <div class="card-text">
                                            <div class="float-left">
                                                <span class="icon-wrap">
                                                    <i class="lni-star-filled"></i>
                                                    <i class="lni-star-filled"></i>
                                                    <i class="lni-star-filled"></i>
                                                    <i class="lni-star-filled"></i>
                                                    <i class="lni-star-filled"></i>
                                                    <i class="lni-star"></i>
                                                </span>
                                                <span class="count-review">
                                                    (12 Review)
                                                </span>
                                            </div>
                                            <div class="float-right">
                                                <a class="address" href="{{ route('locationListings', $ad->county) }}">{{-- <i
                                                        class="lni-map-marker"></i> --}} - {{ $ad->county }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="works section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="section-title">How It Works?</h3>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="works-item">
                        <div class="icon-box my-number">
                            <img src="{{ asset('assets/img/one.png') }}" alt="Step 1">{{-- <i class="lni-users"></i> --}}
                        </div>
                        <p>Create an Account</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="works-item">
                        <div class="icon-box my-number">
                            <img src="{{ asset('assets/img/two.png') }}" alt="Step 2">{{-- <i class="lni-bookmark-alt"></i> --}}
                        </div>
                        <p>Post Free Ad</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="works-item">
                        <div class="icon-box my-number">
                            <img src="{{ asset('assets/img/three.png') }}" alt="Step 3">{{-- <i class="lni-thumbs-up"></i> --}}
                        </div>
                        <p>Deal Done</p>
                    </div>
                </div>
                <hr class="works-line">
            </div>
        </div>
    </section>


@endsection
