@extends('layouts.app')

@section('content')


    <div class="page-header" style="background: url(assets/img/banner1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">Post you Ads</h2>
                        <ol class="breadcrumb">
                            <li><a href="#">Home /</a></li>
                            <li class="current">Post you Ads</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="content" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3 page-sidebar">
                    <aside>
                        <div class="sidebar-box">
                            <div class="user">
                                <figure>
                                    <a href="#"><img src="assets/img/author/img1.jpg" alt=""></a>
                                </figure>
                                <div class="usercontent">
                                    <h3>Hello William!</h3>
                                    <h4>Administrator</h4>
                                </div>
                            </div>
                            <nav class="navdashboard">
                                <ul>
                                    <li>
                                        <a href="dashboard.html">
                                            <i class="lni-dashboard"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="account-profile-setting.html">
                                            <i class="lni-cog"></i>
                                            <span>Profile Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="account-myads.html">
                                            <i class="lni-layers"></i>
                                            <span>My Ads</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="lni-envelope"></i>
                                            <span>Offers/Messages</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="payments.html">
                                            <i class="lni-wallet"></i>
                                            <span>Payments</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="account-favourite-ads.html">
                                            <i class="lni-heart"></i>
                                            <span>My Favourites</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="account-profile-setting.html">
                                            <i class="lni-star"></i>
                                            <span>Privacy Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="lni-enter"></i>
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">Advertisement</h4>
                            <div class="add-box">
                                <img class="img-fluid" src="assets/img/img1.jpg" alt="">
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-9">
                    <div class="row page-content">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="inner-box">
                                <div class="dashboard-box">
                                    <h2 class="dashbord-title">Ad Detail</h2>
                                </div>
                                <div class="dashboard-wrapper">
                                    <div class="form-group mb-3">
                                        <label class="control-label">Project Title</label>
                                        <input class="form-control input-md" name="Title" placeholder="Title"
                                               type="text">
                                    </div>
                                    <div class="form-group mb-3 tg-inputwithicon">
                                        <label class="control-label">Categories</label>
                                        <div class="tg-select form-control">
                                            <select>
                                                <option value="none">Select Categories</option>
                                                <option value="none">Mobiles</option>
                                                <option value="none">Electronics</option>
                                                <option value="none">Training</option>
                                                <option value="none">Real Estate</option>
                                                <option value="none">Services</option>
                                                <option value="none">Training</option>
                                                <option value="none">Vehicles</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="control-label">Price Title</label>
                                        <input class="form-control input-md" name="price" placeholder="Ad your Price"
                                               type="text">
                                    </div>
                                    <div class="form-group md-3">
                                        <section id="editor">
                                            <div id="summernote">
                                            </div>
                                        </section>
                                    </div>
                                    <label class="tg-fileuploadlabel" for="tg-photogallery">
                                        <span>Drop files anywhere to upload</span>
                                        <span>Or</span>
                                        <span class="btn btn-common">Select Files</span>
                                        <span>Maximum upload file size: 500 KB</span>
                                        <input id="tg-photogallery" class="tg-fileinput" type="file" name="file">
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
