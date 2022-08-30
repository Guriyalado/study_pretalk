<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('Subjects', 'Subjects') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" />
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <!-- Styles -->
    <!-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> -->
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <style>
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
            width: 48px;
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




@media (min-width: 992px) {
    .modal-lg,
    .modal-xl {
        max-width: 1300px;
    }
}
    </style>
</head>

<body>

    <main id="main" class="main">
        <div class="pt-4">
            {{ $slot }}
        </div>

    </main>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>

    <script src="{{ asset('assets/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>

    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script >
            toastr.options = {
            "positionClass": 'toast-top-right',
            "closeButton": false,
            "showDuration": "5000",
            "hideDuration": "5000",
            "timeOut": "5000",
            "extendedTimeOut": "0",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    </script>
    @yield('custom_js')
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('js/en.js') }}"></script>
</body>

</html>
