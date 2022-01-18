<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>@yield('title') - Car Parts</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('theme') }}/assets/images/favicon.png" type="image/png">


    <!-- CSS
    ============================================ -->

    <!--===== Vendor CSS (Bootstrap & Icon Font) =====-->

    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/plugins/kentekenplaat.min.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/plugins/fontawesome.min.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/plugins/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/plugins/default.css">


    <!--===== Plugins CSS (All Plugins Files) =====-->
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/plugins/animate.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/plugins/slick.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/plugins/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/plugins/sumoselect.min.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/plugins/dropzone.min.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/plugins/gijgo.min.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/plugins/filepond.min.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/plugins/grt-cookies-consent.css">
    <!--validation libraries-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/7.3/styles/github.min.css">
    <link rel="stylesheet" href="https://parsleyjs.org/src/parsley.css">
    <!--====== Main Style CSS ======-->
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />


    <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->

    <!-- <link rel="stylesheet" href="assets/css/vendor/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
    <style>
        .toast-info {
            background-color: green;
        }
        #toast-container > .toast-success {
            opacity: 1 !important;
        }
        #toast-container > .toast-error {
            opacity: 1 !important;
        }
        .search-field .single-field input{
            padding: 30px 13px 10px;
            height: 60px;
        }
        .api-field {
            position: relative;
        }
        .submit-api{
            position: absolute;
            cursor: pointer;
            bottom: 4%;
            right: 5%;
            display: inline-block;
            font-size: 10px;
            color: #ffffff;
            background-color: #293957;
            height: 25px;
            width: 25px;
            line-height: 25px;
            text-align: center;
            margin: 0 auto;
            border-radius: 100%;
        }
        .error-icon{
            position: absolute;
            cursor: pointer;
            bottom: 15%;
            right: 7%;
            display: inline-block;
            font-size: 14px;
            color: #ff3333;
        }
        .kentekenplaat{
            font-size: 2em;
            padding-left: 0.8em;
            width: 100%;
            max-width: none;
            margin-top: 20px;
            height: 60px;
        }
        .toast-info {
            background-color: green;
        }
        #toast-container > .toast-success {
            opacity: 1 !important;
        }
        #toast-container > .toast-error {
            opacity: 1 !important;
        }
        .star-checked
        {
            color:orange !important;
        }
        .btn-new-secondary
        {
            background-color:#1a1f28 !important;
            border-color: #1a1f28 !important;
            color: white;
        }
        .btn-new-secondary:hover
        {
            color:#ce8339 !important;
        }
        .lang-list-menu
        {
            min-width: 60px !important;
            font-size:14px !important;
            font-weight: normal;
        }
        .language_dropdown,
        .language_dropdown_mobile
        {
            padding: 0px !important;
        }
        .language_dropdown button:focus,
        .language_dropdown_mobile button:focus
        {
            outline: 0 !important;
            box-shadow: none !important;
            border:0px !important;
        }
        .language_dropdown button:hover,
        .language_dropdown_mobile button:hover
        {
            color:white !important;
        }
        .language_dropdown button
        {
            padding: 0px !important;
        }
        .language_dropdown_mobile .dropdown-menu a
        {
            padding:2px !important;
            padding-top:0px !important;
            padding-bottom: 0px !important;
        }
        .language_dropdown_mobile button
        {
            padding:3px !important;
            border-radius:0px !important;
        }

        .language_dropdown_mobile button,
        .language_dropdown_mobile .dropdown-menu a
        {
            font-size:10px !important;
        }
        .language_dropdown .dropdown-menu a
        {
            padding: 7px !important;
            padding-top:0px !important;
            padding-bottom: 0px !important;
        }
        .language_dropdown_mobile .dropdown-menu
        {
            background-color:#2e3031 !important;
        }
        .language_dropdown_mobile .dropdown-menu a
        {
            color:white !important;
            background-color:#2e3031 !important;
            border-radius: 0px !important;
        }
        .single-car-item-2
        {
            box-shadow: 0 10px 25px 0 rgb(50 50 93 / 7%), 0 5px 15px 0 rgb(0 0 0 / 7%);
            padding-bottom:20px !important;

        }
        .single-car-item-2 .car-content
        {
            padding-left:10px !important;

        }
        .single-car-item-2 .car-image img
        {
            width: 100% !important;
            object-fit: cover;
            height: 25vh;
        }
        .author-meta .main-btn
        {
            /*height: 25px;*/
            align-items: center;
            align-content: center;
            line-height: 1.6;
        }
        .detail_button
        {
            text-align: right;
            padding-right: 10px;
        }
        .detail_button a
        {
            background: #ce8339;
            color: white;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
    @yield('css')
</head>

<body>

    @include('front.components.header')

    @yield('content')

    @include('front.components.footer')

    <!--====== BACK TOP TOP START ======-->

    <a href="#" class="back-to-top"><i class="ion-ios-arrow-up"></i></a>
    
    <!--====== BACK TOP TOP ENDS ======-->
    <div class="grt-cookie">
		<div class="grt-cookies-msg">
			<p>
				We use cookies to ensure that we give you the best experience on our website. If you continue to use this site we will assume that you accept and understand our <a href="">Privacy Policy</a>, and our <a href="">Terms of Service</a>.
			</p>
		</div>
		<span class="grt-cookie-button">Accept</span>
	</div>

    <!--====== Jquery js ======-->
    <script src="{{ asset('theme') }}/assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('theme') }}/assets/js/vendor/modernizr-3.7.1.min.js"></script>

    <!--====== All Plugins js ======-->
    <script src="{{ asset('theme') }}/assets/js/plugins/popper.min.js"></script>
    <script src="{{ asset('theme') }}/assets/js/plugins/bootstrap.min.js"></script>
    <script src="{{ asset('theme') }}/assets/js/plugins/slick.min.js"></script>
    <script src="{{ asset('theme') }}/assets/js/plugins/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('theme') }}/assets/js/plugins/jquery.sumoselect.min.js"></script>
    <script src="{{ asset('theme') }}/assets/js/plugins/gijgo.min.js"></script>
    <script src="{{ asset('theme') }}/assets/js/plugins/dropzone.min.js"></script>
    <script src="{{ asset('theme') }}/assets/js/plugins/jquery.countdown.min.js"></script>
    <script src="{{ asset('theme') }}/assets/js/plugins/ajax-contact.js"></script>
    <script src="{{ asset('theme') }}/assets/js/plugins/grt-cookie-consent.js"></script>
    <script src="{{ asset('theme') }}/assets/js/plugins/kentekenplaat.min.js"></script>
    <script src="https://parsleyjs.org/dist/parsley.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>


    <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->

    <!-- <script src="assets/js/plugins.min.js"></script> -->


    <!--====== Main Activation  js ======-->
    <script src="{{ asset('theme') }}/assets/js/main.js"></script>
    <script>
        $(".grt-cookie").grtCookie({
			// Main text and background color
			textcolor: "#333",
			background: "#FFCD69",
			// Button colors
			buttonbackground: "#c40b14",
			buttontextcolor: "#fff",
			// Duration in days
			duration: 365,
		});

        $(document).ready(function () {


            $(".car-plate-api input").keyup(function (e) {
                $(".car-plate-api .error-icon").hide();
                if ($(this).val().length > 0) {
                    $(".car-plate-api .submit-api").fadeIn();
                } else{
                    $(".car-plate-api .submit-api").fadeOut();
                }
            });

            $(".vin-api input").keyup(function (e) {
                if ($(this).val().length > 0) {
                    $(".vin-api .submit-api").fadeIn();
                } else{
                    $(".vin-api .submit-api").fadeOut();
                }
            });

            $('#plate').keypress(function (e) {
                var key = e.which;
                if(key == 13)  // the enter key code
                {
                    
                    e.preventDefault();

                    let plate = $('.car-plate-api input').val().replace(/\-/g, "");
                    $.ajax({
                        url: "https://opendata.rdw.nl/resource/m9d7-ebf2.json?kenteken=" + plate,
                        type: "GET",
                        data: {
                            "$limit": 2,
                            "$$app_token": "cqwVRMIOusKCD4ssxYYLyWWES"
                        },
                        success: function (response) {
                            console.log(response);
                            if (response.length > 0) {
                                $(".car-plate-api .error-icon").fadeOut();
                                $(".car-plate-remain").fadeIn();

                                $(".car_plate_make").val(response[0]['merk']);
                                $(".car_plate_model").val(response[0]['handelsbenaming']);
                            } else {
                                $(".car-plate-api .submit-api").hide();
                                $(".car-plate-api .error-icon").fadeIn();
                                $(".car-plate-remain").fadeOut();
                            }

                        }
                    });  
                }
            });

            $(".car-plate-api .submit-apiiii").click(function (e) {
                e.preventDefault();

                let plate = $('.car-plate-api input').val().replace(/\-/g, "");
                $.ajax({
                    url: "https://opendata.rdw.nl/resource/m9d7-ebf2.json?kenteken=" + plate,
                    type: "GET",
                    data: {
                        "$limit": 2,
                        "$$app_token": "cqwVRMIOusKCD4ssxYYLyWWES"
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.length > 0) {
                            $(".car-plate-api .error-icon").fadeOut();
                            $(".car-plate-remain").fadeIn();

                            $(".car_plate_make").val(response[0]['merk']);
                            $(".car_plate_model").val(response[0]['handelsbenaming']);
                        } else {
                            $(".car-plate-api .submit-api").hide();
                            $(".car-plate-api .error-icon").fadeIn();
                            $(".car-plate-remain").fadeOut();
                        }

                    }
                });
            });

            $(".vin-api .submit-api").click(function (e) {
                e.preventDefault();
                let vin = $('.vin-api input').val().replace(/\-/g, "");
                const settings = {
                    "async": true,
                    "crossDomain": true,
                    "url": "https://vindecoder.p.rapidapi.com/v2.0/decode_vin",
                    "method": "GET",
                    "headers": {
                        "key": "4042ca9f31msh350afe2420b2b28p18ef81jsn88d77c1a7731",
                        "host": "vindecoder.p.rapidapi.com"
                    }
                };
                console.log(settings.url+'?vin='+vin)
                $.ajax({
                    url: settings.url +'?vin='+ vin,
                    type: settings.method,
                    data: {
                        "$limit": 2,
                        "$$app_token": "cqwVRMIOusKCD4ssxYYLyWWES"
                    },
                    async : settings.async,
                    headers: {
                        "x-rapidapi-key": settings.headers.key,
                        "x-rapidapi-host": settings.headers.host,
                    },

                    success: function (response) {
                        console.log(response);
                        if (response.length > 0) {
                            $(".car-plate-api .error-icon").fadeOut();
                            $(".car-plate-remain").fadeIn();

                            $("input[name=car_plate_make]").val(response[0]['merk']);
                            $("input[name=car_plate_model]").val(response[0]['handelsbenaming']);
                        } else {
                            $(".car-plate-api .submit-api").hide();
                            $(".car-plate-api .error-icon").fadeIn();
                            $(".car-plate-remain").fadeOut();
                        }

                    }
                });
            });

        });
        // Logout Form Submit
        $('.logout-button').on('click',function(e){
            e.preventDefault();
            $('.form-logout').submit();
        });

        @if(session('success'))
            toastr.success("{{ session('success') }}");
        @elseif(session('error'))
            toastr.error("{{ session('error') }}");
        @endif
        
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
    @yield('js')
</body>

</html>
