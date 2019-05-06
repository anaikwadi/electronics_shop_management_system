<!--
author: Boostraptheme
author URL: https://boostraptheme.com
License: Creative Commons Attribution 4.0 Unported
License URL: https://creativecommons.org/licenses/by/4.0/
-->

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SAI ELECTRONICS</title>
    <link rel="shortcut icon" href="img/favicon.ico">

    <!-- Global Stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
    <link href="{{ asset('businessbox/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('businessbox/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('businessbox/css/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('businessbox/css/owl-carousel/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('businessbox/css/owl-carousel/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('businessbox/css/style.css') }}" rel="stylesheet">

    {{-- Contact Us Page CSS --}}
    <link href="{{ asset('businessbox/css/contact.css') }}" rel="stylesheet">
    {{-- Latest Offer Shop Item Page CSS --}}
    <link href="{{ asset('businessbox/css/shop.css') }}" rel="stylesheet">
    {{-- Latest Offer Item details Page CSS --}}
    <link href="{{ asset('businessbox/css/single-product.css') }}" rel="stylesheet">
    {{-- About Us Page CSS --}}
    <link href="{{ asset('businessbox/css/careers.css') }}" rel="stylesheet">
    {{-- Our Team Page CSS --}}
    <link href="{{ asset('businessbox/css/team.css') }}" rel="stylesheet">
     {{-- Testimonial Page CSS --}}
     <link href="{{ asset('businessbox/css/testimonials.css') }}" rel="stylesheet">

     
  </head>
  

  <body id="page-top">

    @include('NavMenu.navmenu')
         

    @yield('content')


		@include('Footer.footer')

   
  </body>

   <!--Global JavaScript -->
   <script type="text/javascript" src="{{ URL::asset('businessbox/js/jquery/jquery.min.js') }}"></script>
   <script type="text/javascript" src="{{ URL::asset('businessbox/js/popper/popper.min.js') }}"></script>
   <script type="text/javascript" src="{{ URL::asset('businessbox/js/bootstrap/bootstrap.min.js') }}"></script>
   <script type="text/javascript" src="{{ URL::asset('businessbox/js/wow/wow.min.js') }}"></script>
   <script type="text/javascript" src="{{ URL::asset('businessbox/js/owl-carousel/owl.carousel.min.js') }}"></script>
   
   <!-- Plugin JavaScript -->
   <script type="text/javascript" src="{{ URL::asset('businessbox/js/jquery-easing/jquery.easing.min.js') }}"></script>
   <script type="text/javascript" src="{{ URL::asset('businessbox/js/custom.js') }}"></script>
   

</html>
