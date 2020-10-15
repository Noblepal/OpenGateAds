@extends('layouts.app')

@section('content')
    <div class="page-header" style="background: url({{ asset('assets/img/banner1.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">Browse {{ $header }}</h2>
                        <ol class="breadcrumb">
                            <li><a href="/">Home /</a></li>
                            <li class="current">Browse {{ $header }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="main-container section-padding">
        <div class="container">
            <div class="row">
                <p class="lead">Missed Adverts</p>
            </div>
        </div>
    </div>



@endsection
