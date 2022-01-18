<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from htmldemo.hasthemes.com/corify-preview/corify/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Dec 2020 10:29:06 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>Login - Car Parts</title>

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
                <div class="col-xl-4 col-md-2"></div>
                <div class="col-xl-4 col-md-8">
                    <div class="login-register">
                        <h2 class="title">{{siteSetting()['login_titlel'] ?? ''}}</h2>
                        <p>{{siteSetting()['login_sub_title'] ?? ''}}</p>

                        <div class="login-register-form">
                            <form action="{{ route('post.login') }}" method="POST">
                                @csrf
                                <div class="single-form">
                                    <input type="email" placeholder="{{siteSetting()['username_placeholder'] ?? ''}}" name="email" class="@error('email') is-invalid @enderror">
                                    @error('email')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="single-form">
                                    <input type="password" placeholder="{{siteSetting()['password_placeholder'] ?? ''}}" name="password" class="@error('password') is-invalid @enderror">
                                    @error('password')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="checkbox-forgot d-flex align-items-center justify-content-between">
                                    <div class="single-form">
                                        <input id="checkbox1" type="checkbox">
                                        <label for="checkbox1"><span></span> {{siteSetting()['remember_me'] ?? ''}}</label>
                                    </div>
                                    <div class="single-form">
                                        <a href="{{ route('password.request') }}">{{siteSetting()['forgot_title'] ?? ''}}</a>
                                    </div>
                                </div>
                                <div class="single-form form-btn">
                                    <button class="main-btn btn-block" type="submit">{{siteSetting()['login_titlel'] ?? ''}}</button>
                                </div>

                                <div class="single-form">
                                    <a href="{{ route('register') }}">{{siteSetting()['register_link'] ?? ''}}</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-2"></div>
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

    <script>
        function mapDataToFields(data)
        {
            $.map(data, function(value, index){
                var input = $('[name="'+index+'"]');
                if($(input).length && $(input).attr('type') !== 'file')
                {
                  if(($(input).attr('type') == 'radio' || $(input).attr('type') == 'checkbox') && value == $(input).val())
                    $(input).prop('checked', true);
                  else
                      $(input).val(value).change();
                }
            });
        }
        var data = <?php echo json_encode(session()->getOldInput()) ?>;
        mapDataToFields(data);
    </script>

</body>


<!-- Mirrored from htmldemo.hasthemes.com/corify-preview/corify/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Dec 2020 10:29:06 GMT -->
</html>
