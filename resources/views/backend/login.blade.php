<!doctype html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <meta name="keywords" content="HTML5 Admin Template"/>
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light"
          rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.css') }}"/>

    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/magnific-popup/magnific-popup.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/datepicker3.css') }}"/>

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/backend/stylesheets/theme.css') }}"/>

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ asset('assets/backend/stylesheets/skins/default.css') }}"/>

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/backend/stylesheets/theme-custom.css') }}">

    <!-- Head Libs -->
    <script src="{{ asset('assets/backend/vendor/modernizr/modernizr.js') }}"></script>
</head>
<body>
<!-- start: page -->
<section class="body-sign">
    <div class="center-sign">
        <a href="{{ route('home') }}" class="logo pull-left">
            <img src="{{ asset('assets/backend/images/logo.png') }}" height="54" alt="Porto Admin"/>
        </a>

        <div class="panel panel-sign">
            <div class="panel-title-sign mt-xl text-right">
                <h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
            </div>
            <div class="panel-body">
                @include('backend.layouts.validation')
                <form action="{{ route('backend.login') }}" method="POST">
                    @csrf
                    <div class="form-group mb-lg">
                        <label for="username">Username</label>
                        <div class="input-group input-group-icon">
                            <input name="username" id="username" type="text" class="form-control input-lg" value="{{ old('username') }}"/>
                            <span class="input-group-addon">
                                <span class="icon icon-lg">
                                    <i class="fa fa-user"></i>
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group mb-lg">
                        <div class="clearfix">
                            <label for="password">Password</label>
                        </div>
                        <div class="input-group input-group-icon">
                            <input name="password" id="password" type="password" class="form-control input-lg"/>
                            <span class="input-group-addon">
                                <span class="icon icon-lg">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </span>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block btn-lg">
                        Sign In
                    </button>
                </form>
            </div>
        </div>

        {{--<p class="text-center text-muted mt-md mb-md">&copy; Copyright 2014. All Rights Reserved.</p>--}}
    </div>
</section>
<!-- end: page -->

<!-- Vendor -->
<script src="{{ asset('assets/vendor/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/vendor/nanoscroller/nanoscroller.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('assets/vendor/magnific-popup/magnific-popup.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>


</body>
</html>