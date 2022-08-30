<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>@yield('title','Subjects')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard " name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="backend/assets/images/favicon.ico">

    <!-- plugin css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" />

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <link href="{{ asset('backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}"
        rel="stylesheet" type="text/css" />


    <!-- preloader css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/preloader.min.css') }}'" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />

    <!-- Icons Css -->
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    @yield('custom_css')
<style>
    .well {
    min-height: 20px;
    padding: 19px;
    margin-bottom: 20px;
    background-color: #f5f5f5;
    border: 1px solid #e3e3e3;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 5%);
    box-shadow: inset 0 1px 1px rgb(0 0 0 / 5%);
}
        .btn-primary:focus,
        .btn-primary.focus {
            color: #ffffff !important;
        }

        .card-body {
            margin-bottom: 1rem !important;
        }

        .topbar .top-navbar .profile-pic img {
            width: 30px;
            border-radius: 100%;
        }
        span.md-line {
        color: red;
        }

        div.dt-button-collection {
            position: absolute;
            top: 0;
            left: 0;
            width: 150px;
            margin-top: 3px;
            padding: 8px 8px 4px 8px;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, 0.4);
            background-color: white;
            overflow: scroll;
            z-index: 2002;
            border-radius: 5px;
            box-shadow: 3px 3px 5px rgb(0 0 0 / 30%);
            box-sizing: border-box;
            padding: 5px !important;
        }

        .dt-buttons .dt-button {
            padding: 5px !important;
            border-radius: 0.25rem;
            color: #fff;
            margin-right: 3px;
            margin: 2px !important;
            margin-right: 2px !important;
        }

        .dt-button-collection .dt-button {
            width: 100%;

        }

        .topbar .top-navbar .profile-pic img {
            width: 30px;
            border-radius: 100%;
        }

        .dt-button-collection>a,
        .dt-button-collection>a:focus,
        .dt-button-collection>a:hover {
            color: #fff;
            text-decoration: none;
            background-color: #337ab7;
            outline: 0;
        }

        .dt-button-collection>a {
            color: #777;
        }

        .dt-button-collection {
            background-color: #fff !important;
            padding: 10px 0px 10px 0px !important;
        }

        .dt-button-collection>a {
            border-radius: 0px !important;
            display: block;
            padding: 3px 20px;
            clear: both;
            font-weight: 400;
            line-height: 1.42857143;
            color: #FFF !important;
            white-space: nowrap;
            background-image: none !important;
            background: #4099ff !important;
            box-shadow: none !important;
            margin-bottom: 0px !important;
            border: none !important;
        }

        button.dt-button:active:not(.disabled):hover:not(.disabled),
        button.dt-button.active:not(.disabled):hover:not(.disabled),
        div.dt-button:active:not(.disabled):hover:not(.disabled),
        div.dt-button.active:not(.disabled):hover:not(.disabled),
        a.dt-button:active:not(.disabled):hover:not(.disabled),
        a.dt-button.active:not(.disabled):hover:not(.disabled) {

            box-shadow: none !important;
            background-color: none !important;
            background-image: none !important;
            background-image: none !important;
            background-image: none !important;
            background-image: none !important;
            background-image: none !important;
        }

        .toast-success {
            background: green !important;
            color: #FFF;
        }

        .toast-error {
            background: red !important;
            color: #FFF;
        }

        .toast-warning {
            background: yellow !important;
            color: #FFF;
        }

       td img {
            width: 100px;
            height: 50px;
        }

        #toast-container>div {
            position: relative;
            pointer-events: auto;
            overflow: hidden;
            margin: 0 0 6px;
            width: 300px;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            background-position: 15px center;
            background-repeat: no-repeat;
            -moz-box-shadow: 0 0 12px #999;
            -webkit-box-shadow: 0 0 12px #999;
            box-shadow: 0 0 12px #999;
            color: #fff;
            opacity: .8;
            -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=80);
            filter: alpha(opacity=80);
        }

        .toast-center-center {
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        #toast-container>.toast-success {
            background-repeat: no-repeat !important;
            background-position: 15px 12px !important;
        }

        #toast-container>.toast-info {
            background-repeat: no-repeat !important;
            background-position: 15px 12px !important;
            /* padding: 15px 15px 15px 50px !important; */
        }

        #toast-container>.toast-error {
            background-repeat: no-repeat !important;
            background-position: 15px 18px !important;
        }

        .text-white {
            color: #fff;
        }

        .bootstrap-tagsinput {
            display: block;
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1.5;
            color: #4F5467;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #e9ecef;
            border-radius: 0.25rem;
        }

        .nav-tabs-custom {
    margin-bottom: 20px;
    background: #fff;
    box-shadow: 0 1px 1px rgb(0 0 0 / 10%);
    border-radius: 3px;
}
.nav-tabs-custom>.nav-tabs>li {
    border-top: 3px solid transparent;
    margin-bottom: -2px;
    margin-right: 5px;
}

li .active {
    background: red;
    color: white !important;
}


@media (min-width: 992px) {
    .modal-lg,
    .modal-xl {
        max-width: 1300px;
    }
}



    </style>
</head>

<body data-topbar="dark">

    @if (auth()->check())
        <div id="layout-wrapper">

            @include('admin.layouts.partials.header')

            <!-- ========== Left Sidebar Start ========== -->
            @include('admin.layouts.partials.sidebar')
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        {{-- <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Welcome !</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Welcome !</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div> --}}
                        <!-- end page title -->
                        {{$slot}}

                        <!-- container-fluid -->
                    </div>
                    <!-- End Page-content -->

                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6">
                                    <script>

                                    </script> © {{ env('APP_NAME') }}.
                                </div>

                            </div>
                        </div>
                    </footer>
                </div>
                <!-- end main content-->

            </div>
            <!-- END layout-wrapper -->
        </div>
    @else
    {{$slot}}
    @endif
    <!-- JAVASCRIPT -->
    <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous"></script>
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/feather-icons/feather.min.js') }}"></script>
    <!-- pace js -->
    <script src="{{ asset('backend/assets/libs/pace-js/pace.min.js') }}"></script>

    <!-- apexcharts -->
    <script src="{{ asset('backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Plugins js-->
    <script src="{{ asset('backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}">
    </script>
    <script
        src="{{ asset('backend/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}">
    </script>
    <!-- dashboard init -->
    <script src="{{ asset('backend/assets/js/pages/dashboard.init.js') }}"></script>
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>

<script src="{{ asset('backend/assets/js/main.js') }}"></script>


    <script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ asset('backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}">
    </script>


    @yield('custom_js')
</body>


</html>
