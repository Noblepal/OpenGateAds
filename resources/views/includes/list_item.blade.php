@foreach($ads as $ad)
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
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
                <h4><a href="{{route('adDetails',$ad->id)}}">{{$ad->title}}</a></h4>
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
                    <h3 class="price float-left">Ksh {{number_format($ad->price, 0)}}</h3>
                    <a href="{{route('adDetails',$ad->id)}}" class="btn btn-common float-right">View Details</a>
                </div>
            </div>
        </div>
    </div>

@endforeach
