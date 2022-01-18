<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from htmldemo.hasthemes.com/corify-preview/corify/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Dec 2020 10:29:06 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>Register - Car Parts</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('theme') }}/assets/images/favicon.png" type="image/png">


    <!-- CSS
    ============================================ -->

    <!--===== Vendor CSS (Bootstrap & Icon Font) =====-->

    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/plugins/fontawesome.min.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/plugins/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/plugins/default.css">

    <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->

    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/vendor/plugins.min.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/style.min.css">
    <style>
        @media(max-width: 768px)
        {
            .header_img{
                width:100%;
            }
        }
    </style>
</head>

<body>

    <section class="login-register-page">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 text-center">
                    <a href="{{ route('home') }}">
                        <img class="header_img" src="{{ asset(fixSetting()['dark_logo']) }}" alt="Car Parts">
                    </a>
                </div>
                <div class="col-lg-3 col-sm-2 col-2"></div>
                <div class="col-lg-6 col-sm-8 col-8">
                    <div class="login-register">
                        <h2 class="title">Register</h2>
                        <p>Create new account today to reap the benefits of a personalized <br> shopping experience.</p>

                        <div class="login-register-form">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="single-form">
                                    <input type="text" name="name" placeholder="{{siteSetting()['profile_full_name_label'] ?? ''}}" class="@error('name') is-invalid @enderror" value="{{old('name')}}">
                                    @error('name')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="single-form">
                                    <input type="email" name="email" placeholder="Email" class="@error('email') is-invalid @enderror" value="{{old('email')}}">
                                    @error('email')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="single-form">
                                    <input type="password" name="password" placeholder="Password" class="@error('password') is-invalid @enderror">
                                    @error('password')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="single-form">
                                    <input type="password" name="password_confirmation" placeholder="Confirm Password" class="@error('password_confirmation') is-invalid @enderror">
                                    @error('password_confirmation')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="checkbox-forgot">
                                    <div class="single-form">
                                        <input id="checkbox2" type="checkbox">
                                        <label for="checkbox2"><span></span> I accept <a href="{{ route('terms') }}">Term of Use</a> & <a href="{{ route('privacy') }}">Privacy Policy</a></label>
                                    </div>
                                </div>
                                <div class="single-form form-btn">
                                    <button class="main-btn btn-block">register now</button>
                                </div>

                                <div class="single-form">
                                    <a href="{{ route('login') }}">Already Have Account? Login Here</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-2 col-2"></div>
            </div>
        </div>
    </section>



    <!--====== Jquery js ======-->
    <script src="{{ asset('theme') }}/assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('theme') }}/assets/js/vendor/modernizr-3.7.1.min.js"></script>
    <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->

    <script src="{{ asset('theme') }}/assets/js/plugins.min.js"></script>


    <!--====== Main Activation  js ======-->
    <script src="{{ asset('theme') }}/assets/js/main.js"></script>


</body>


<!-- Mirrored from htmldemo.hasthemes.com/corify-preview/corify/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Dec 2020 10:29:06 GMT -->
</html>
