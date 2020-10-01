@extends('layouts.app')

@section('content')


    <div class="page-header" style="background: url({{asset('assets/img/banner1.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">Details -> {{$ad->title }}</h2>
                        <ol class="breadcrumb">
                            <li><a href="#">Home /</a></li>
                            <li class="current">{{$ad->category->name}} / {{$ad->title }} </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="section-padding">
        <div class="container">

            <div class="product-info row">
                <div class="col-lg-8 col-md-12 col-xs-12">
                    <div class="ads-details-wrapper">
                        <div id="owl-demo" class="owl-carousel owl-theme">
                            @foreach($ad->photos as $photo)

                                <div class="item">
                                    <div class="product-img">
                                        <img class="img-fluid"
                                             src="{{url('/openGateAds').'/'.$photo->image_path}}"
                                             alt="ad photo">
                                    </div>
                                    <span class="price">Ksh {{number_format($ad->price, 0)}}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="details-box">
                        <div class="ads-details-info">
                            <h2>{{$ad->title}}</h2>
                            <div class="details-meta">
                                <span><a href="#"><i class="lni-alarm-clock"></i> {{$ad->created_at->format('d M, yy')}}</a></span>
                                <span><a href="#"><i class="lni-map-marker"></i> {{$ad->county}}</a></span>
                            </div>
                            <p class="mb-4">{!!$ad->description !!}</h4>
                        </div>
                        <div class="tag-bottom">
                            <div class="float-left">
                                <ul class="advertisement">
                                    <li>
                                        <p><strong><i class="lni-folder"></i> Categories:</strong> <a
                                                href="#">{{$ad->category->name}}</a>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="float-right">
                                <div class="share">
                                    <div class="social-link">
                                        <a class="-whatsapp" data-toggle="tooltip" data-placement="top" title="whatsapp"
                                           href="whatsapp://send/?text=Check out {{$ad->title}}  on OpenGate%20{{{route('adDetails',$ad->id)}}}"><img
                                                src="{{asset('assets/fonts/whatsapp.svg')}}" class=""/></a>
                                        <a class="facebook" data-toggle="tooltip" data-placement="top" title="facebook"
                                           href="http://www.facebook.com/sharer.php?u={{route('adDetails',$ad->id)}}"
                                           target="_blank"><i class="lni-facebook-filled"></i></a>
                                        <a class="twitter" data-toggle="tooltip" data-placement="top" title="twitter"
                                           href="http://twitter.com/share?url={{route('adDetails',$ad->id)}}&text=Check out {{$ad->title}} on openGate  &hashtags=openGate"><i
                                                class="lni-twitter-filled"></i></a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">

                    <aside class="details-sidebar">
                        <div class="widget">
                            <h4 class="widget-title">Ad Posted By</h4>
                            <div class="agent-inner">
                                <div class="agent-title">
                                    <div class="agent-photo">
                                        <a href="#"><img
                                                src="{{$ad->user->profile_pic == null ? asset('assets/img/productinfo/agent.jpg') : url('/openGateAdsProfilePics').'/'.$ad->user->profile_pic}}"
                                                alt=""></a>
                                    </div>
                                    <div class="agent-details">
                                        <h3><a href="#">{{$ad->user->fname.' '.$ad->user->lname}}</a></h3>
                                        <span><i class="lni-phone-handset"></i>{{$ad->user->phone}}</span>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Your Email">
                                <input type="text" class="form-control" placeholder="Your Phone">
                                <p>I'm interested in this property [ID 123456] and I'd like to know more details.</p>
                                <button class="btn btn-common fullwidth mt-4">Send Message</button>
                            </div>
                        </div>

                        <div class="widget">
                            <h4 class="widget-title">More Ads From Seller</h4>
                            <ul class="posts-list">
                                @foreach($seller_ads as $ad)

                                <li>
                                    <div class="widget-thumb">
                                        <a href="{{route('adDetails',$ad->id)}}"><img src="{{url('/openGateAds').'/'.$ad->photos->where('type','main_image')->pluck('image_path')->first()}}"
                                                         alt="ad photo"/></a>
                                    </div>
                                    <div class="widget-content">
                                        <h4><a href="{{route('adDetails',$ad->id)}}">{{$ad->title}}</a></h4>
                                        <div class="meta-tag">
                                            <span>
                                            <a href="{{route('sellerListings',$ad->user->id)}}"><i class="lni-user"></i> {{$ad->user->fname.' '.$ad->user->lname}}</a>
                                            </span>
                                                                                    <span>
                                            <a href="{{route('locationListings',$ad->county)}}"><i class="lni-map-marker"></i> {{$ad->county}}r</a>
                                            </span>
                                                                                    <span>
                                            <a href="{{route('categoryListings',$ad->category->id)}}"><i class="lni-tag"></i> {{$ad->category->name}}</a>
                                            </span>
                                        </div>
                                        <h4 class="price">Ksh {{number_format($ad->price, 0)}}</h4>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>

                </div>
            </div>

        </div>
    </div>


    <section class="subscribes section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="subscribes-inner">
                        <div class="icon">
                            <i class="lni-pointer"></i>
                        </div>
                        <div class="sub-text">
                            <h3>Subscribe to Newsletter</h3>
                            <p>and receive new ads in inbox</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <form>
                        <div class="subscribe">
                            <input class="form-control" name="EMAIL" placeholder="Enter your Email" required=""
                                   type="email">
                            <button class="btn btn-common" type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection
