<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>{{config('app.name', 'Laravel')}}</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('user/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('user/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <link rel="stylesheet" href="{{asset('user/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('user/dist/css/styles.css')}}">
</head>

<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        @include('user.components.header')
        @include('user.components.sidebar')
        <div class="content-wrapper">
            <div class="content-header">
                @yield('container')
            </div>
        </div>
        @include('user.components.footer')
    </div>
    <script src="{{asset('user/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('user/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('user/dist/js/adminlte.js')}}"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <!-- <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script> -->
</body>
</html>