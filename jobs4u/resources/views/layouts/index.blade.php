<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Job4u</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('skill') }}/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('skill') }}/css/animate.css">
    
    <link rel="stylesheet" href="{{ asset('skill') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('skill') }}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('skill') }}/css/magnific-popup.css">

    <link rel="stylesheet" href="{{ asset('skill') }}/css/aos.css">

    <link rel="stylesheet" href="{{ asset('skill') }}/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ asset('skill') }}/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{ asset('skill') }}/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="{{ asset('skill') }}/css/flaticon.css">
    <link rel="stylesheet" href="{{ asset('skill') }}/css/icomoon.css">
    <link rel="stylesheet" href="{{ asset('skill') }}/css/style.css">
  </head>
  <body>
	@include('layouts.skill.navs.nav')
    <!-- END nav -->    
	@yield('conteudo')
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{ asset('skill') }}/js/jquery.min.js"></script>
  <script src="{{ asset('skill') }}/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="{{ asset('skill') }}/js/popper.min.js"></script>
  <script src="{{ asset('skill') }}/js/bootstrap.min.js"></script>
  <script src="{{ asset('skill') }}/js/jquery.easing.1.3.js"></script>
  <script src="{{ asset('skill') }}/js/jquery.waypoints.min.js"></script>
  <script src="{{ asset('skill') }}/js/jquery.stellar.min.js"></script>
  <script src="{{ asset('skill') }}/js/owl.carousel.min.js"></script>
  <script src="{{ asset('skill') }}/js/jquery.magnific-popup.min.js"></script>
  <script src="{{ asset('skill') }}/js/aos.js"></script>
  <script src="{{ asset('skill') }}/js/jquery.animateNumber.min.js"></script>
  <script src="{{ asset('skill') }}/js/scrollax.min.js"></script>
  <script src="{{ asset('skill') }}/https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset('skill') }}/js/google-map.js"></script>
  <script src="{{ asset('skill') }}/js/main.js"></script>
    
  @yield('scripts')
  </body>
</html>