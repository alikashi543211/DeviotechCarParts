<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('admin/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title> @yield('title') | CARPARTS </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Quicksand:300,400,700|Material+Icons" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('admin/css/material-dashboard.css?v=2.1.2') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/dropify/css/dropify.min.css')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="{{asset('admin')}}/assets/demo/demo.css" rel="stylesheet" />
    <style>
        
            .h1,
            .h2,
            .h3,
            .h4,
            body,
            p,
            a,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                font-family: Quicksand;
                font-weight: 400;
            }
            .table thead th {
                border-top-width: 1px !important;
                color: #000 !important;
                font-weight: bold !important;
                font-size: 14px !important;
            }
            .table>tbody>tr>td {
                font-weight: 500;
            }
            .card-title,
            .error {
                font-weight: bold;
            }
            .form-control {
                border: 1px solid #e7e7e7;
                border-radius: 0px;
                padding: 4px 10px;
            }
            input.form-control,
            textarea.form-control,
            select.form-control{
                background-image: none !important;
            }
            input.form-control,
            select.form-control {
                height: calc(2.4375rem + 1px) !important;
            }
            label,
            .bmd-label-static{
                font-weight: bold;
                text-transform: capitalize;
                margin-bottom: 3px;
                color: #000;
            }
            .select2-hidden-accessible{
                display: none;
            }
            .select2-container,
            .select2-container--default .select2-selection--single,
            .select2-container .select2-selection--single,
            .select2-container--default .select2-selection--single .select2-selection__arrow{
                height: calc(2.4375rem + 1px) !important;
                border-radius: 0px;
            }
            .select2-container--default .select2-selection--single .select2-selection__rendered{
                line-height: calc(2.4375rem + 1px) !important;
            }
            .table.dataTable tbody tr.selected,
            table.dataTable tbody th.selected,
            table.dataTable tbody td.selected {
                color: #333333 !important;
            }
            table.dataTable tbody > tr.selected,
            table.dataTable tbody > tr > .selected{
                background-color: #e7e7e7;
            }
            form .form-group select.form-control{
                position: relative;
                top: 0;
            }
            .sidebar .nav p{
                font-weight: 500;
            }
            .card .card-header .card-title{
                font-weight: bold !important;
            }
            .page-item.active .page-link{
                background-color: #9c27b0 !important;
            }
            .sidebar{
                overflow: hidden;
            }
            .lg-sidebar-toggle{
                font-size: 20px;
                position: fixed;
                left: 26px;
                top: 16px;
                z-index: 10000;
                padding: 5px;
                background: #fff;
                border-radius: 50%;
            }
            span.badge{
                font-weight: bold;
            }
            .card [class*="card-header-"] .card-icon, .card [class*="card-header-"] .card-text{
                margin-right: 10px;
            }
            .card-stats .card-footer{
                border-top: none !important;
                padding-top: 0px;
            }
            .sidebar .logo .simple-text{
                font-weight: bold;
            }
            .table > tbody > tr > td{
                font-weight: 500;
            }

            .card-title{
                font-weight: bold;
            }
            .navbar .navbar-brand{
                font-weight: bold;
            }
            input[type="file"]{
                z-index: 0;
            }

            label{
                color: #000000 !important;
            }
            .img-uploader{
                position: relative;
            }
            .add-img,
            .remove-img{
                color: #EA5455;
                font-size: 18px;
                position: absolute;
                top: 0;
                right: 18px;
                cursor: pointer;
                z-index: 999;
            }
            .remove-img{
                color: #EA5455;
                right: 38px;
            }
            .form-group input[type=file]{
                z-index: 0;
                opacity: 1 !important;
            }
            .bootstrap-tagsinput{
                width: 100%;
            }
            .bootstrap-tagsinput .tag{
                background: #9c27b0;
            }
            #toast-container > .toast-success {
                opacity: 1 !important;
            }
            #toast-container > .toast-error {
                opacity: 1 !important;
            }
            @media(max-width: 991px){
                .lg-sidebar-toggle{
                    display: none;
                }
            }
            .sidebar .logo .simple-text {
                text-align: center;
            }
    </style>
    @yield('css')
</head>

<body class="">
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('admin_theme/img/sidebar-1.jpg') }}">
            @include('admin.components.sidebar')
        </div>
        <div class="main-panel">
            @include('admin.components.navbar')
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
  <!--   Core JS Files   -->
    <script src="{{ asset('admin/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/core/bootstrap-material-design.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/moment.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/sweetalert2.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/bootstrap-selectpicker.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/bootstrap-tagsinput.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/nouislider.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <script src="{{ asset('admin/js/plugins/chartist.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/bootstrap-notify.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{asset('admin')}}/assets/demo/demo.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('admin/js/material-dashboard.js?v=2.1.2') }}" type="text/javascript"></script>
    <script src="{{asset('admin/dropify/js/dropify.min.js')}}"></script>
    <script>
        $('.dropify').dropify();
    </script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            $('.bmd-form-group').each(function(){
                $(this).find('label').removeClass('bmd-label-floating');
                $(this).removeClass('bmd-form-group');
            });
            $('table.datatable').DataTable({
                "sort": true,
                "ordering": true,
                "order": [[0,"desc"]],
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                }
            });
        });

        // Datepicker intiliaziation
        $( function() {
            $( ".datepicker" ).datepicker({
                dateFormat: 'yy-mm-dd' ,
            });
        } );

    </script>
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
        // Filters On Admin Side Clear And Submit
        $(document).on('change','.filter_field',function(e){
            e.preventDefault();
            $('.filter-form').submit();
        });

        $('.clear').on('click',function(e){
            e.preventDefault();
            $('.filter-form .filter_field').val('');
            $('.filter-form').submit();
        });

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

        // Delete Popup
          var deleteID = document.querySelectorAll(".delete");
           deleteID.forEach(function(e) {
            e.addEventListener("click", function(event) {
                event.preventDefault();
                $url=$(this).attr("data-url");
                swal({
                      title: "Are you sure?",
                      text: "Once deleted, you will not be able to recover",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,
                    })
                    .then((willDelete) => {
                      if (willDelete) {
                        window.location.href = $url;
                      }
                    });
               });
            });
    </script>

    @yield('js')
</body>

</html>
