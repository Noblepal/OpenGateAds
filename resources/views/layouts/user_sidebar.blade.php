<div class="col-sm-12 col-md-3 col-lg-3 page-sidebar">
    <aside>
        <div class="sidebar-box">
            <div class="user">
                <figure>
                    <a href="#"><img
                            src=" {{$user->profile_pic == null ? asset('assets/img/author/img1.png') : url('/ProfilePics').'/'.$user->profile_pic }}
                                    " alt="profile pic"></a>
                </figure>
                <div class="usercontent">
                    <h3>Hello {{$user->fname." ".$user->lname}}!</h3>
                </div>
            </div>
            <nav class="navdashboard">
                <ul>
                    <li>
                        <a class="{{ Route::currentRouteNamed('dashboard') ? 'active' : '' }}"
                           href="{{route('dashboard')}}">
                            <i class=""></i>
                            <span> Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Route::currentRouteNamed('postAd') ? 'active' : '' }}"
                           href="{{route('postAd')}}">
                           <i class=""></i>
                            <span> Post Ad</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Route::currentRouteNamed('myAds') ? 'active' : '' }}"
                           href="{{route('myAds')}}">
                           <i class=""></i>
                            <span> My Ads</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Route::currentRouteNamed('pendingPending') ? 'active' : '' }}"
                           href="{{route('pendingPending')}}">
                            <i class=""></i>
                            <span> Pending Payment</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Route::currentRouteNamed('favouriteAds') ? 'active' : '' }}"
                           href="{{route('favouriteAds')}}">
                           <i class=""></i>
                            <span> My Favourites</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Route::currentRouteNamed('profileSettings') ? 'active' : '' }}"
                           href="{{route('profileSettings')}}">
                            <i class=""></i>
                            <span> Profile Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            <i class=""></i>
                            <span> Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="widget">
            <h4 class="widget-title">Advertisement</h4>
            <div class="add-box">
                <img class="img-fluid" src="{{asset('assets/img/img1.jpg')}}" alt="">
            </div>
        </div>
    </aside>
</div>
