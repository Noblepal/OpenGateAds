@extends('layouts.app')

@section('content')
<div id="hero-area">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-9 col-xs-12 text-center">
                <div class="contents">
                    <h1 class="head-title">Welcome to The Largest <span class="year">Marketplace</span></h1>
                    <p>Buy and sell everything from used cars to mobile phones and computers, or search for
                        property, jobs and more</p>
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
                                            <option value="none">Locations</option>
                                            <option value="none">New York</option>
                                            <option value="none">California</option>
                                            <option value="none">Washington</option>
                                            <option value="none">Birmingham</option>
                                            <option value="none">Chicago</option>
                                            <option value="none">Phoenix</option>
                                        </select>
                                    </div>
                                    <i class="lni-target"></i>
                                </div>
                                <div class="form-group inputwithicon">
                                    <div class="select">
                                        <select>
                                            <option value="none">Select Catagory</option>
                                            <option value="none">Jobs</option>
                                            <option value="none">Electronics</option>
                                            <option value="none">Mobile</option>
                                            <option value="none">Training</option>
                                            <option value="none">Pets</option>
                                            <option value="none">Real Estate</option>
                                            <option value="none">Services</option>
                                            <option value="none">Training</option>
                                            <option value="none">Vehicles</option>
                                        </select>
                                    </div>
                                    <i class="lni-menu"></i>
                                </div>
                                <button class="btn btn-common" type="button"><i class="lni-search"></i> Search
                                    Now</button>
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
                        <div class="item">
                            <a href="category.html">
                                <div class="category-icon-item">
                                    <div class="icon-box">
                                        <div class="icon">
                                            <img src="{{ asset('assets/img/category/img-1.png') }}" alt="">
                                        </div>
                                        <h4>Goods</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="category.html">
                                <div class="category-icon-item">
                                    <div class="icon-box">
                                        <div class="icon">
                                            <img src="{{ asset('assets/img/category/img-2.png') }}" alt="">
                                        </div>
                                        <h4>Services</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="category.html">
                                <div class="category-icon-item">
                                    <div class="icon-box">
                                        <div class="icon">
                                            <img src="{{ asset('assets/img/category/img-3.png') }}" alt="">
                                        </div>
                                        <h4>Property</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="category.html">
                                <div class="category-icon-item">
                                    <div class="icon-box">
                                        <div class="icon">
                                            <img src="{{ asset('assets/img/category/img-4.png') }}" alt="">
                                        </div>
                                        <h4>Jobs</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="category.html">
                                <div class="category-icon-item">
                                    <div class="icon-box">
                                        <div class="icon">
                                            <img src="{{ asset('assets/img/category/img-5.png') }}" alt="">
                                        </div>
                                        <h4>Travel</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="category.html">
                                <div class="category-icon-item">
                                    <div class="icon-box">
                                        <div class="icon">
                                            <img src="{{ asset('assets/img/category/img-6.png') }}" alt="">
                                        </div>
                                        <h4>Events</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="category.html">
                                <div class="category-icon-item">
                                    <div class="icon-box">
                                        <div class="icon">
                                            <img src="{{ asset('assets/img/category/img-1.png') }}" alt="">
                                        </div>
                                        <h4>Innovations</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="category.html">
                                <div class="category-icon-item">
                                    <div class="icon-box">
                                        <div class="icon">
                                            <img src="{{ asset('assets/img/category/img-2.png') }}" alt="">
                                        </div>
                                        <h4>Discoveries</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="category.html">
                                <div class="category-icon-item">
                                    <div class="icon-box">
                                        <div class="icon">
                                            <img src="{{ asset('assets/img/category/img-3.png') }}" alt="">
                                        </div>
                                        <h4>Others</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="featured section-padding">
        <div class="container">
            <h1 class="section-title">Latest Products</h1>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                    <div class="featured-box">
                        <figure>
                            <div class="icon">
                                <span class="bg-green"><i class="lni-heart"></i></span>
                                <span><i class="lni-bookmark"></i></span>
                            </div>
                            <a href="#"><img class="img-fluid" src="assets/img/featured/img-1.jpg" alt=""></a>
                        </figure>
                        <div class="feature-content">
                            <div class="product">
                                <a href="#">Electronic > </a>
                                <a href="#">Cameras</a>
                            </div>
                            <h4><a href="ads-details.html">Canon SX Powershot ...</a></h4>
                            <div class="meta-tag">
                                <span>
                                    <a href="#"><i class="lni-user"></i> John Smith</a>
                                </span>
                                <span>
                                    <a href="#"><i class="lni-map-marker"></i> New York, US</a>
                                </span>
                                <span>
                                    <a href="#"><i class="lni-tag"></i> Canon</a>
                                </span>
                            </div>
                            <p class="dsc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry.</p>
                            <div class="listing-bottom">
                                <h3 class="price float-left">$249.00</h3>
                                <a href="ads-details.html" class="btn btn-common float-right">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                    <div class="featured-box">
                        <figure>
                            <span class="price-save">
                                25% Save
                            </span>
                            <div class="icon">
                                <span class="bg-green"><i class="lni-heart"></i></span>
                                <span><i class="lni-bookmark"></i></span>
                            </div>
                            <a href="#"><img class="img-fluid" src="assets/img/featured/img-2.jpg" alt=""></a>
                        </figure>
                        <div class="feature-content">
                            <div class="product">
                                <a href="#">Electronic > </a>
                                <a href="#">Computers</a>
                            </div>
                            <h4><a href="ads-details.html">Apple Macbook Pro ...</a></h4>
                            <div class="meta-tag">
                                <span>
                                    <a href="#"><i class="lni-user"></i> Sara Doe</a>
                                </span>
                                <span>
                                    <a href="#"><i class="lni-map-marker"></i> California, US</a>
                                </span>
                                <span>
                                    <a href="#"><i class="lni-tag"></i> Phones</a>
                                </span>
                            </div>
                            <p class="dsc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry.</p>
                            <div class="listing-bottom">
                                <h3 class="price float-left">$289.00</h3>
                                <a href="ads-details.html" class="btn btn-common float-right">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                    <div class="featured-box">
                        <figure>
                            <div class="icon">
                                <span class="bg-green"><i class="lni-heart"></i></span>
                                <span><i class="lni-bookmark"></i></span>
                            </div>
                            <a href="#"><img class="img-fluid" src="assets/img/featured/img-3.jpg" alt=""></a>
                        </figure>
                        <div class="feature-content">
                            <div class="product">
                                <a href="#">Vehicle > </a>
                                <a href="#">Cars</a>
                            </div>
                            <h4><a href="ads-details.html">Mercedes Benz E200 ...</a></h4>
                            <div class="meta-tag">
                                <span>
                                    <a href="#"><i class="lni-user"></i> Rossi Josh</a>
                                </span>
                                <span>
                                    <a href="#"><i class="lni-map-marker"></i> Washington, US</a>
                                </span>
                                <span>
                                    <a href="#"><i class="lni-tag"></i> Others</a>
                                </span>
                            </div>
                            <p class="dsc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry.</p>
                            <div class="listing-bottom">
                                <h3 class="price float-left">$199.80</h3>
                                <a href="ads-details.html" class="btn btn-common float-right">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                    <div class="featured-box">
                        <figure>
                            <span class="price-save">
                                10% Save
                            </span>
                            <div class="icon">
                                <span class="bg-green"><i class="lni-heart"></i></span>
                                <span><i class="lni-bookmark"></i></span>
                            </div>
                            <a href="#"><img class="img-fluid" src="assets/img/featured/img-4.jpg" alt=""></a>
                        </figure>
                        <div class="feature-content">
                            <div class="product">
                                <a href="#">Others > </a>
                                <a href="#">Bags</a>
                            </div>
                            <h4><a href="ads-details.html">Brown Leather Bag ...</a></h4>
                            <div class="meta-tag">
                                <span>
                                    <a href="#"><i class="lni-user"></i> Maria Barlow</a>
                                </span>
                                <span>
                                    <a href="#"><i class="lni-map-marker"></i> Chicago, US</a>
                                </span>
                                <span>
                                    <a href="#"><i class="lni-tag"></i> Gucci</a>
                                </span>
                            </div>
                            <p class="dsc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry.</p>
                            <div class="listing-bottom">
                                <h3 class="price float-left">$206.90</h3>
                                <a href="ads-details.html" class="btn btn-common float-right">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                    <div class="featured-box">
                        <figure>
                            <div class="icon">
                                <span class="bg-green"><i class="lni-heart"></i></span>
                                <span><i class="lni-bookmark"></i></span>
                            </div>
                            <a href="#"><img class="img-fluid" src="assets/img/featured/img-5.jpg" alt=""></a>
                        </figure>
                        <div class="feature-content">
                            <div class="product">
                                <a href="#">Electronic > </a>
                                <a href="#">Apple</a>
                            </div>
                            <h4><a href="ads-details.html">Iphonex 6 Plus Factor ...</a></h4>
                            <div class="meta-tag">
                                <span>
                                    <a href="#"><i class="lni-user"></i> David Givens</a>
                                </span>
                                <span>
                                    <a href="#"><i class="lni-map-marker"></i> New York, US</a>
                                </span>
                                <span>
                                    <a href="#"><i class="lni-tag"></i> Apple</a>
                                </span>
                            </div>
                            <p class="dsc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry.</p>
                            <div class="listing-bottom">
                                <h3 class="price float-left">$106.70</h3>
                                <a href="ads-details.html" class="btn btn-common float-right">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                    <div class="featured-box">
                        <figure>
                            <span class="price-save">
                                35% Save
                            </span>
                            <div class="icon">
                                <span class="bg-green"><i class="lni-heart"></i></span>
                                <span><i class="lni-bookmark"></i></span>
                            </div>
                            <a href="#"><img class="img-fluid" src="assets/img/featured/img-6.jpg" alt=""></a>
                        </figure>
                        <div class="feature-content">
                            <div class="product">
                                <a href="#">Furniture > </a>
                                <a href="#">Home</a>
                            </div>
                            <h4><a href="ads-details.html">Wooden Dining Tabl ...</a></h4>
                            <div class="meta-tag">
                                <span>
                                    <a href="#"><i class="lni-user"></i> John Smith</a>
                                </span>
                                <span>
                                    <a href="#"><i class="lni-map-marker"></i> New York, US</a>
                                </span>
                                <span>
                                    <a href="#"><i class="lni-tag"></i> Apple</a>
                                </span>
                            </div>
                            <p class="dsc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry.</p>
                            <div class="listing-bottom">
                                <h3 class="price float-left">$120.00</h3>
                                <a href="ads-details.html" class="btn btn-common float-right">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="featured-lis section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 wow fadeIn" data-wow-delay="0.5s">
                    <h3 class="section-title">Featured Products</h3>
                    <div id="new-products" class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="product-item">
                                <div class="carousel-thumb">
                                    <img class="img-fluid" src="assets/img/product/img1.jpg" alt="">
                                    <div class="overlay">
                                        <div>
                                            <a class="btn btn-common" href="ads-details.html">View Details</a>
                                        </div>
                                    </div>
                                    <div class="btn-product bg-sale">
                                        <a href="#">Sale</a>
                                    </div>
                                    <span class="price">$999.00</span>
                                </div>
                                <div class="product-content">
                                    <h3 class="product-title"><a href="ads-details.html">Macbook Pro 2020</a></h3>
                                    <span>Electronic / Computers</span>
                                    <div class="icon">
                                        <span><i class="lni-bookmark"></i></span>
                                        <span><i class="lni-heart"></i></span>
                                    </div>
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
                                            <a class="address" href="#"><i class="lni-map-marker"></i> New York</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-item">
                                <div class="carousel-thumb">
                                    <img class="img-fluid" src="assets/img/product/img2.jpg" alt="">
                                    <div class="overlay">
                                        <div>
                                            <a class="btn btn-common" href="ads-details.html">View Details</a>
                                        </div>
                                    </div>
                                    <span class="price">$269.00</span>
                                </div>
                                <div class="product-content">
                                    <h3 class="product-title"><a href="ads-details.html">Nikon Camera</a></h3>
                                    <span>Electronic / Camera</span>
                                    <div class="icon">
                                        <span><i class="lni-bookmark"></i></span>
                                        <span><i class="lni-heart"></i></span>
                                    </div>
                                    <div class="card-text">
                                        <div class="float-left">
                                            <span class="icon-wrap">
                                                <i class="lni-star-filled"></i>
                                                <i class="lni-star-filled"></i>
                                                <i class="lni-star-filled"></i>
                                                <i class="lni-star-filled"></i>
                                                <i class="lni-star-filled"></i>
                                                <i class="lni-star-filled"></i>
                                            </span>
                                            <span class="count-review">
                                                (2 Review)
                                            </span>
                                        </div>
                                        <div class="float-right">
                                            <a class="address" href="#"><i class="lni-map-marker"></i> California</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-item">
                                <div class="carousel-thumb">
                                    <img class="img-fluid" src="assets/img/product/img3.jpg" alt="">
                                    <div class="overlay">
                                        <div>
                                            <a class="btn btn-common" href="ads-details.html">View Details</a>
                                        </div>
                                    </div>
                                    <div class="btn-product bg-slod">
                                        <a href="#">Sold</a>
                                    </div>
                                    <span class="price">$799.00</span>
                                </div>
                                <div class="product-content">
                                    <h3 class="product-title"><a href="ads-details.html">iPhone X Refurbished</a></h3>
                                    <span>Electronic / Phones</span>
                                    <div class="icon">
                                        <span><i class="lni-bookmark"></i></span>
                                        <span><i class="lni-heart"></i></span>
                                    </div>
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
                                                (8 Review)
                                            </span>
                                        </div>
                                        <div class="float-right">
                                            <a class="address" href="#"><i class="lni-map-marker"></i> New York</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-item">
                                <div class="carousel-thumb">
                                    <img class="img-fluid" src="assets/img/product/img4.jpg" alt="">
                                    <div class="overlay">
                                        <div>
                                            <a class="btn btn-common" href="ads-details.html">View Details</a>
                                        </div>
                                    </div>
                                    <span class="price">$99.00</span>
                                </div>
                                <div class="product-content">
                                    <h3 class="product-title"><a href="ads-details.html">Baby Toy</a></h3>
                                    <span>Sports / Baby Toys</span>
                                    <div class="icon">
                                        <span><i class="lni-bookmark"></i></span>
                                        <span><i class="lni-heart"></i></span>
                                    </div>
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
                                            <a class="address" href="#"><i class="lni-map-marker"></i> New York</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-item">
                                <div class="carousel-thumb">
                                    <img class="img-fluid" src="assets/img/product/img5.jpg" alt="">
                                    <div class="overlay">
                                        <div>
                                            <a class="btn btn-common" href="ads-details.html">View Details</a>
                                        </div>
                                    </div>
                                    <span class="price">$99.00</span>
                                </div>
                                <div class="product-content">
                                    <h3 class="product-title"><a href="ads-details.html">Baby Toy</a></h3>
                                    <span>Sports / Baby Toys</span>
                                    <div class="icon">
                                        <span><i class="lni-bookmark"></i></span>
                                        <span><i class="lni-heart"></i></span>
                                    </div>
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
                                            <a class="address" href="#"><i class="lni-map-marker"></i> New York</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-item">
                                <div class="carousel-thumb">
                                    <img class="img-fluid" src="assets/img/product/img6.jpg" alt="">
                                    <div class="overlay">
                                        <div>
                                            <a class="btn btn-common" href="ads-details.html">View Details</a>
                                        </div>
                                    </div>
                                    <div class="btn-product bg-sale">
                                        <a href="#">Sale</a>
                                    </div>
                                    <span class="price">$99.00</span>
                                </div>
                                <div class="product-content">
                                    <h3 class="product-title"><a href="ads-details.html">Baby Toy</a></h3>
                                    <span>Sports / Baby Toys</span>
                                    <div class="icon">
                                        <span><i class="lni-bookmark"></i></span>
                                        <span><i class="lni-heart"></i></span>
                                    </div>
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
                                            <a class="address" href="#"><i class="lni-map-marker"></i> New York</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        <div class="icon-box">
                            <i class="lni-users"></i>
                        </div>
                        <p>Create an Account</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="works-item">
                        <div class="icon-box">
                            <i class="lni-bookmark-alt"></i>
                        </div>
                        <p>Post Free Ad</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="works-item">
                        <div class="icon-box">
                            <i class="lni-thumbs-up"></i>
                        </div>
                        <p>Deal Done</p>
                    </div>
                </div>
                <hr class="works-line">
            </div>
        </div>
    </section>


    {{-- <section class="services bg-light section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="section-title">Key Features</h3>
                </div>

                <div class="col-md-6 col-lg-4 col-xs-12">
                    <div class="services-item wow fadeInRight" data-wow-delay="0.2s">
                        <div class="icon">
                            <i class="lni-leaf"></i>
                        </div>
                        <div class="services-content">
                            <h3><a href="#">Elegant Design</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo aut magni perferendis.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xs-12">
                    <div class="services-item wow fadeInRight" data-wow-delay="0.4s">
                        <div class="icon">
                            <i class="lni-display"></i>
                        </div>
                        <div class="services-content">
                            <h3><a href="#">Responsive Design</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo aut magni perferendis.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xs-12">
                    <div class="services-item wow fadeInRight" data-wow-delay="0.6s">
                        <div class="icon">
                            <i class="lni-color-pallet"></i>
                        </div>
                        <div class="services-content">
                            <h3><a href="#">Clean UI</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo aut magni perferendis.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xs-12">
                    <div class="services-item wow fadeInRight" data-wow-delay="0.8s">
                        <div class="icon">
                            <i class="lni-emoji-smile"></i>
                        </div>
                        <div class="services-content">
                            <h3><a href="#">UX Friendly</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo aut magni perferendis.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xs-12">
                    <div class="services-item wow fadeInRight" data-wow-delay="1s">
                        <div class="icon">
                            <i class="lni-pencil-alt"></i>
                        </div>
                        <div class="services-content">
                            <h3><a href="#">Easily Customizable</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo aut magni perferendis.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xs-12">
                    <div class="services-item wow fadeInRight" data-wow-delay="1.2s">
                        <div class="icon">
                            <i class="lni-headphone-alt"></i>
                        </div>
                        <div class="services-content">
                            <h3><a href="#">Security Support</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo aut magni perferendis.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="pricing-table" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title">Pricing Plan</h2>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="table">
                        <div class="icon">
                            <i class="lni-gift"></i>
                        </div>
                        <div class="pricing-header">
                            <p class="price-value">$29</p>
                        </div>
                        <div class="title">
                            <h3>Basic</h3>
                        </div>
                        <ul class="description">
                            <li>Free ad posting</li>
                            <li>No Featured ads availability</li>
                            <li>Access to limited features</li>
                            <li>For 30 days</li>
                            <li>100% Secure!</li>
                        </ul>
                        <button class="btn btn-common">Purchase</button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="table" id="active-tb">
                        <div class="icon">
                            <i class="lni-leaf"></i>
                        </div>
                        <div class="pricing-header">
                            <p class="price-value">$49</p>
                        </div>
                        <div class="title">
                            <h3>Standard</h3>
                        </div>
                        <ul class="description">
                            <li>Free ad posting</li>
                            <li>10 Featured ads availability</li>
                            <li>Access to unlimited features</li>
                            <li>For 30 days</li>
                            <li>100% Secure!</li>
                        </ul>
                        <button class="btn btn-common">Purchase</button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="table">
                        <div class="icon">
                            <i class="lni-layers"></i>
                        </div>
                        <div class="pricing-header">
                            <p class="price-value">$69</p>
                        </div>
                        <div class="title">
                            <h3>Premium</h3>
                        </div>
                        <ul class="description">
                            <li>Free ad posting</li>
                            <li>100 Featured ads availability</li>
                            <li>Access to unlimited features</li>
                            <li>For 30 days</li>
                            <li>100% Secure!</li>
                        </ul>
                        <button class="btn btn-common">Purchase</button>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="testimonial section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div id="testimonials" class="owl-carousel">
                        <div class="item">
                            <div class="img-thumb">
                                <img src="assets/img/testimonial/img1.png" alt="">
                            </div>
                            <div class="testimonial-item">
                                <div class="content">
                                    <p class="description">Eiusmod tempor incidiunt labore velit dolore magna aliqu sed
                                        eniminim veniam quis nostrud exercition eullamco laborisaa, Eiusmod tempor incidiunt
                                        labore velit dolore magna.</p>
                                    <div class="info-text">
                                        <h2><a href="#">Josh Rossi</a></h2>
                                        <h4><a href="#">CEO of Fiverr</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item">
                                <div class="img-thumb">
                                    <img src="assets/img/testimonial/img2.png" alt="">
                                </div>
                                <div class="testimonial-item">
                                    <div class="content">
                                        <p class="description">Eiusmod tempor incidiunt labore velit dolore magna aliqu sed
                                            eniminim veniam quis nostrud exercition eullamco laborisaa, Eiusmod tempor
                                            incidiunt labore velit dolore magna.</p>
                                        <div class="info-text">
                                            <h2><a href="#">Jessica</a></h2>
                                            <h4><a href="#">CEO of Dropbox</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item">
                                <div class="img-thumb">
                                    <img src="assets/img/testimonial/img3.png" alt="">
                                </div>
                                <div class="testimonial-item">
                                    <div class="content">
                                        <p class="description">Eiusmod tempor incidiunt labore velit dolore magna aliqu sed
                                            eniminim veniam quis nostrud exercition eullamco laborisaa, Eiusmod tempor
                                            incidiunt labore velit dolore magna.</p>
                                        <div class="info-text">
                                            <h2><a href="#">Johnny Zeigler</a></h2>
                                            <h4><a href="#">CEO of Fiverr</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item">
                                <div class="img-thumb">
                                    <img src="assets/img/testimonial/img4.png" alt="">
                                </div>
                                <div class="testimonial-item">
                                    <div class="content">
                                        <p class="description">Eiusmod tempor incidiunt labore velit dolore magna aliqu sed
                                            eniminim veniam quis nostrud exercition eullamco laborisaa, Eiusmod tempor
                                            incidiunt labore velit dolore magna.</p>
                                        <div class="info-text">
                                            <h2><a href="#">Josh Rossi</a></h2>
                                            <h4><a href="#">CEO of Fiverr</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item">
                                <div class="img-thumb">
                                    <img src="assets/img/testimonial/img5.png" alt="">
                                </div>
                                <div class="testimonial-item">
                                    <div class="content">
                                        <p class="description">Eiusmod tempor incidiunt labore velit dolore magna aliqu sed
                                            eniminim veniam quis nostrud exercition eullamco laborisaa, Eiusmod tempor
                                            incidiunt labore velit dolore magna.</p>
                                        <div class="info-text">
                                            <h2><a href="#">Priyanka</a></h2>
                                            <h4><a href="#">CEO of Dropbox</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="blog" class="section-padding">

        <div class="container">
            <h2 class="section-title">
                Blog Post
            </h2>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-xs-12 blog-item">

                    <div class="blog-item-wrapper">
                        <div class="blog-item-img">
                            <a href="single-post.html">
                                <img src="assets/img/blog/img-1.jpg" alt="">
                            </a>
                        </div>
                        <div class="blog-item-text">
                            <div class="meta-tags">
                                <span class="user float-left"><a href="#"><i class="lni-user"></i> Posted By
                                        Admin</a></span>
                                <span class="date float-right"><i class="lni-calendar"></i> 24 May, 2018</span>
                            </div>
                            <h3>
                                <a href="single-post.html">Recently Launching Our Iphone X</a>
                            </h3>
                            <p>
                                Reprehenderit nemo quod tempore doloribus ratione distinctio quis quidem vitae sunt
                                reiciendis, molestias omnis soluta.
                            </p>
                            <a href="single-post.html" class="btn btn-common">Read More</a>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-6 col-xs-12 blog-item">

                    <div class="blog-item-wrapper">
                        <div class="blog-item-img">
                            <a href="single-post.html">
                                <img src="assets/img/blog/img-2.jpg" alt="">
                            </a>
                        </div>
                        <div class="blog-item-text">
                            <div class="meta-tags">
                                <span class="user float-left"><a href="#"><i class="lni-user"></i> Posted By
                                        Admin</a></span>
                                <span class="date float-right"><i class="lni-calendar"></i> 24 May, 2018</span>
                            </div>
                            <h3>
                                <a href="single-post.html">How to get more ad views</a>
                            </h3>
                            <p>
                                Reprehenderit nemo quod tempore doloribus ratione distinctio quis quidem vitae sunt
                                reiciendis, molestias omnis soluta.
                            </p>
                            <a href="single-post.html" class="btn btn-common">Read More</a>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-6 col-xs-12 blog-item">

                    <div class="blog-item-wrapper">
                        <div class="blog-item-img">
                            <a href="single-post.html">
                                <img src="assets/img/blog/img-3.jpg" alt="">
                            </a>
                        </div>
                        <div class="blog-item-text">
                            <div class="meta-tags">
                                <span class="user float-left"><a href="#"><i class="lni-user"></i> Posted By
                                        Admin</a></span>
                                <span class="date float-right"><i class="lni-calendar"></i> 24 May, 2018</span>
                            </div>
                            <h3>
                                <a href="single-post.html">Writing a better product description</a>
                            </h3>
                            <p>
                                Reprehenderit nemo quod tempore doloribus ratione distinctio quis quidem vitae sunt
                                reiciendis, molestias omnis soluta.
                            </p>
                            <a href="single-post.html" class="btn btn-common">Read More</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


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
    </section> --}}


@endsection
