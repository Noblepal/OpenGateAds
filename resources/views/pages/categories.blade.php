@extends('layouts.app')

@section('content')

    <div class="page-header"  style="background: url({{asset('assets/img/banner1.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">Categories</h2>
                        <ol class="breadcrumb">
                            <li><a href="/">Home /</a></li>
                            <li class="current">Categories</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="categories-icon bg-light section-padding">
        <div class="container">
            <h1 class="section-title">Ads By Category</h1>
            <div class="row">
                @foreach($categories as $category)
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                    <a href="{{route('categoryListings',$category->id)}}">
                        <div class="icon-box">
                            <div class="icon no-display">
                                <i class="{{$category->icon_name}}"></i>
                            </div>
                            <h4>{{$category->name}}</h4>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection


