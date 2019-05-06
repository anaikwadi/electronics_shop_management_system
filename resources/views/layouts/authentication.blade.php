
<!--
author: Boostraptheme
author URL: https://boostraptheme.com
License: Creative Commons Attribution 4.0 Unported
License URL: https://creativecommons.org/licenses/by/4.0/
-->

<!DOCTYPE html>
<html>

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <title>SAI ELECTRONICS ADMIN </title>
    <link rel="shortcut icon" href="img/favicon.ico">
    
    <!-- global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

    <link href="{{ asset('businessbox/admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('businessbox/admin/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('businessbox/admin/css/font-icon-style.css') }}" rel="stylesheet">
    <link href="{{ asset('businessbox/admin/css/style.default.css') }}" rel="stylesheet" id="theme-stylesheet">

    <!-- Core stylesheets -->
    <link href="{{ asset('businessbox/admin/css/pages/login.css') }}" rel="stylesheet" id="theme-stylesheet">
</head>

<body> 


    @yield('content')
      
</body>

    <!--Global Javascript -->
    <script type="text/javascript" src="{{ URL::asset('businessbox/admin/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('businessbox/admin/js/tether.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('businessbox/admin/js/bootstrap.min.js') }}"></script>
</html>