<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>@yield('title') - CarParts</title>
    <link rel="apple-touch-icon" href="{{ asset('seller') }}/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('seller') }}/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    {{-- image dorpify library --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
     {{-- image dorpify library end--}}
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('seller') }}/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('seller') }}/app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('seller') }}/app-assets/vendors/css/charts/apexcharts.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('seller') }}/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('seller') }}/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('seller') }}/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('seller') }}/app-assets/css/components.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('seller') }}/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('seller') }}/app-assets/css/pages/dashboard-analytics.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('seller') }}/app-assets/css/pages/card-analytics.css">
    {{-- toster css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('seller') }}/assets/css/style.css">
    <style>
        .content-header{
            margin-bottom: 2rem;
        }
        .tippy-popper{
            display: none;
        }
        /*imgage dropify */
       .img-uploader{
            position: relative;
        }
        .add-img,
        .remove-img,
        .delete-img{
            color: #EA5455;
            font-size: 18px;
            position: absolute;
            top: 0;
            right: 18px;
            cursor: pointer;
            z-index: 999;
        }
        .delete-img{
            right: 15px;
        }
        .remove-img{
            color: #EA5455;
            right: 38px;
        }
        /*end image dropify*/
    </style>
    <!-- END: Custom CSS-->
    @yield('css')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" id="capture">

    <!-- BEGIN: Header-->
    @include('seller.components.header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('seller.components.sidebar')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- DELETE MODAL -->
    <div class="modal fade text-left" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel160">Are You Sure To Delete ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <a href="" class="btn btn-danger data_href">Yes</a>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
    <!-- / DELETE MODAL -->

    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('seller') }}/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('seller') }}/app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>


    <script src="{{ asset('seller') }}/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="{{ asset('seller') }}/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('seller') }}/app-assets/js/core/app-menu.js"></script>
    <script src="{{ asset('seller') }}/app-assets/js/core/app.js"></script>
    <script src="{{ asset('seller') }}/app-assets/js/scripts/components.js"></script>
    <script src="{{ asset('seller') }}/app-assets/js/scripts/datatables/datatable.js"></script>
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

    <script src="{{ asset('seller') }}/app-assets/js/scripts/pages/dashboard-analytics.js"></script>

    <!-- Screenshot lene k lye link -->
    <script src="{{ asset('seller')}}/assets/plugins/screenshot/html2canvas.min.js"></script>
    <script src="{{ asset('seller')}}/assets/plugins/screenshot/canvas2image.js"></script>
    @if(Session::has('success'))
        <script>
            toastr.success("{{ Session::get('success') }}");
        </script>
    @endif
    @if(Session::has('error'))
        <script>
            toastr.error("{{ Session::get('error') }}");
        </script>
    @endif

    <script>
        $('.dropify').dropify();
    </script>
    <script>
        $(document).on("click",".del_btn",function()
        {
            var data_href=$(this).attr("data-href");
            $(".data_href").attr("href",data_href);
            $("#delete_modal").modal("show");
        });

        // screen shot jquery code
        var test = $("#capture").get(0);
        // alert(test);
        $('#take_screenshoot').click(function(e) {
            // alert("Hello");
            html2canvas(test).then(function(canvas) {
            // canvas width
            var canvasWidth = canvas.width;
            // canvas height
            var canvasHeight = canvas.height;
            // render canvas
            $('#capture').after(canvas);
            // show 'to image' button
            $('.toPic').show(1000);
            // convert canvas to image
              var img = Canvas2Image.convertToImage(canvas, canvasWidth, canvasHeight);
              // render image
              $(".toPic").after(img);
              // save
                let type = $('#sel').val(); // image type
                let w = $('#imgW').val(); // image width
                let h = $('#imgH').val(); // image height
                let f = $('#imgFileName').val(); // file name
                w = (w === '') ? canvasWidth : w; 
                h = (h === '') ? canvasHeight : h;
                // save as image
                Canvas2Image.saveAsImage(canvas, w, h, type, f);
          });
        }); 
    </script>
    @yield('js')
</body>
<!-- END: Body-->

</html>
