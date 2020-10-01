@extends('layouts.app')
@section('content')


    <div class="page-header" style="background: url({{asset('assets/img/banner1.jpg')}});">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">Register</h2>
                    <ol class="breadcrumb">
                        <li><a href="/">Home /</a></li>
                        <li class="current">Register</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="login section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-12 col-xs-12">
                <div class="login-form login-area">
                    <h3>
                        Register Now
                    </h3>
                    <form class="login-form" method="post" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <div class="input-icon">
                                <i class="lni-user"></i>
                                <input type="text" id="Name" class="form-control @error('fname') is-invalid @enderror"
                                       name="fname" value="{{ old('fname') }}"  autocomplete="first-name" autofocus
                                       placeholder="First Name">
                                @error('fname')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-icon">
                                <i class="lni-user"></i>
                                <input type="text" id="lName" class="form-control @error('lname') is-invalid @enderror"
                                       name="lname" value="{{ old('lname') }}" required autocomplete="sur-name" autofocus
                                       placeholder="Last Name">
                                @error('lname')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-icon">
                                <i class="lni-envelope"></i>
                                <input type="text" id="sender-email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email"
                                       placeholder="Email Address">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-icon">
                                <i class="lni-lock"></i>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                       name="password" required autocomplete="new-password" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-icon">
                                <i class="lni-lock"></i>
                                <input type="password" class="form-control" name="password_confirmation" required
                                       autocomplete="new-password" placeholder="Retype Password">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkedall">
                                <label class="custom-control-label" for="checkedall">By registering, you accept our
                                    Terms & Conditions</label>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-common log-btn">{{ __('Register') }}</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
