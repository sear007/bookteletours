<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="google-site-verification" content="AAvlsNHcYT5Bg1xPok1m4TCrzajam0-KJudBkppAyuc" />
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('css/animate.css')}}">
  <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{asset('css/aos.css')}}">
  <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
  <link rel="stylesheet" href="{{asset('css/jquery.timepicker.css')}}">
  <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
  <link rel="stylesheet" href="{{asset('css/icomoon.css')}}">

  <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css' rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
  <link rel="stylesheet" href="{{asset('css/banner.css')}}">
  <link rel="stylesheet" href="{{asset('css/stepper.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/custom.css')}}">
  <link rel="stylesheet" href="https://payway.ababank.com/checkout-popup.html?file=css"/>
  
  <link rel="stylesheet" href="{{asset('css/footer.css')}}"/>
  @stack('stylesheet')

  <title>@yield('title')</title>
</head>

<body>
  <div id="app">
    @include('components.navbar')
    <div class="container-fluid p-0">
      @yield('content')
    </div>
    @include('components.footer')
  </div>
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('js/aos.js')}}"></script>
  <script src="{{asset('js/axios.min.js')}}"></script>
  <script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
  <script src="{{asset('js/scrollax.min.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>
  @stack('scripts')

</body>

</html>