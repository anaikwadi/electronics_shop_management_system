
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
    <link href="{{ asset('businessbox/admin/css/style.default.css') }}" rel="stylesheet"  id="theme-stylesheet">

    <!-- Core stylesheets -->
    <link href="{{ asset('businessbox/admin/css/ui-elements/card.css') }}" rel="stylesheet">
    <link href="{{ asset('businessbox/admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('businessbox/admin/css/pagination.css') }}" rel="stylesheet">

    
</head>

<body> 

<!--====================================================
                         MAIN NAVBAR
======================================================-->        
    <header class="header">
        <nav class="navbar navbar-expand-lg ">
            <div class="search-box">
                <button class="dismiss"><i class="icon-close"></i></button>
                <form id="searchForm" action="#" role="search">
                    <input type="search" placeholder="Search Now" class="form-control">
                </form>
            </div>
            <div class="container-fluid ">
                <div class="navbar-holder d-flex align-items-center justify-content-between">
                    <div class="navbar-header">
                        <a href="{{ URL::to('/dashboard') }}" class="navbar-brand">
                            {{-- <div class="brand-text brand-big hidden-lg-down"><img src="{{ URL::asset('businessbox/admin/img/logo-white.png') }}" alt="Logo" class="img-fluid"></div> --}}
                            {{-- <div class="brand-text brand-small"><img src="{{ URL::asset('businessbox/admin/img/logo-icon.png') }}" alt="Logo" class="img-fluid"></div> --}}
                            <div class="brand-text brand-big hidden-lg-down">SAI ELECTRONICS</div>                        
                            <div class="brand-text brand-small">SAI</div>
                        </a>
                        <a id="toggle-btn" href="#" class="menu-btn active">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                </div>
                <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                    <!-- Expand-->
                    <li class="nav-item d-flex align-items-center full_scr_exp"><a class="nav-link" href="#"><img src="{{ URL::asset('businessbox/admin/img/expand.png') }}" onclick="toggleFullScreen(document.body)" class="img-fluid" alt=""></a></li>
                    <!-- Search-->
                    {{-- <li class="nav-item d-flex align-items-center"><a id="search" class="nav-link" href="#"><i class="icon-search"></i></a></li> --}}
                    <!-- Notifications-->
                    {{-- <li class="nav-item dropdown"> 
                        <a id="notifications" class="nav-link" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell-o"></i><span class="noti-numb-bg"></span><span class="badge">12</span></a>
                        <ul aria-labelledby="notifications" class="dropdown-menu">
                            <li>
                                <a rel="nofollow" href="#" class="dropdown-item nav-link">
                                    <div class="notification">
                                        <div class="notification-content"><i class="fa fa-envelope bg-red"></i>You have 6 new messages </div>
                                        <div class="notification-time"><small>4 minutes ago</small></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a rel="nofollow" href="#" class="dropdown-item nav-link">
                                    <div class="notification">
                                        <div class="notification-content"><i class="fa fa-twitter bg-skyblue"></i>You have 2 followers</div>
                                        <div class="notification-time"><small>4 minutes ago</small></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a rel="nofollow" href="#" class="dropdown-item nav-link">
                                    <div class="notification">
                                        <div class="notification-content"><i class="fa fa-upload bg-blue"></i>Server Rebooted</div>
                                        <div class="notification-time"><small>4 minutes ago</small></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a rel="nofollow" href="#" class="dropdown-item nav-link">
                                    <div class="notification">
                                        <div class="notification-content"><i class="fa fa-twitter bg-skyblue"></i>You have 2 followers</div>
                                        <div class="notification-time"><small>10 minutes ago</small></div>
                                    </div>
                                </a>
                            </li>
                            <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>view all notifications                                            </strong></a></li>
                        </ul>
                    </li> --}}
                    <!-- Messages                        -->
                    {{-- <li class="nav-item dropdown"> <a id="messages" class="nav-link logout" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-envelope-o"></i><span class="noti-numb-bg"></span><span class="badge">10</span></a>
                        <ul aria-labelledby="messages" class="dropdown-menu">
                            <li>
                                <a rel="nofollow" href="#" class="dropdown-item d-flex">
                                    <div class="msg-profile"> <img src="{{ URL::asset('businessbox/admin/img/avatar-1.jpg') }}" alt="..." class="img-fluid rounded-circle"></div>
                                    <div class="msg-body">
                                        <h3 class="h5 msg-nav-h3">Jason Doe</h3><span>Sent You Message</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a rel="nofollow" href="#" class="dropdown-item d-flex">
                                    <div class="msg-profile"> <img src="{{ URL::asset('businessbox/admin/img/avatar-2.jpg') }}" alt="..." class="img-fluid rounded-circle"></div>
                                    <div class="msg-body">
                                        <h3 class="h5 msg-nav-h3">Frank Williams</h3><span>Sent You Message</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a rel="nofollow" href="#" class="dropdown-item d-flex">
                                    <div class="msg-profile"> <img src="{{ URL::asset('businessbox/admin/img/avatar-3.jpg') }}" alt="..." class="img-fluid rounded-circle"></div>
                                    <div class="msg-body">
                                        <h3 class="h5 msg-nav-h3">Ashley Wood</h3><span>Sent You Message</span>
                                    </div>
                                </a>
                            </li>
                            <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>Read all messages    </strong></a></li>
                        </ul>
                    </li>  --}}
                    <li class="nav-item dropdown"><a id="profile" class="nav-link logout" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ URL::asset('businessbox/admin/img/avatar-1.png') }}" alt="..." class="img-fluid rounded-circle" style="height: 30px; width: 30px;"></a>
                        <ul aria-labelledby="profile" class="dropdown-menu profile">
                            <li>
                                <a rel="nofollow" href="#" class="dropdown-item d-flex">
                                    <div class="msg-profile"> <img src="{{ URL::asset('businessbox/admin/img/avatar-1.png') }}" alt="..." class="img-fluid rounded-circle"></div>
                                    <div class="msg-body">
                                    <h3 class="h5">{{ Auth::User()->name }} </h3>
                                    <span>
                                        {{ Auth::User()->email }}  <br>
                                        Last Login : {{ \Carbon\Carbon::parse(Auth::User()->updated_at)->format('d-M-Y h:i') }}
                                    </span>
                                    </div>
                                </a>
                                <hr>
                            </li>
                            {{-- <li>
                                <a rel="nofollow" href="profile.html" class="dropdown-item">
                                    <div class="notification">
                                        <div class="notification-content"><i class="fa fa-user "></i>My Profile</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a rel="nofollow" href="profile.html" class="dropdown-item">
                                    <div class="notification">
                                        <div class="notification-content"><i class="fa fa-envelope-o"></i>Inbox</div> 
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a rel="nofollow" href="profile.html" class="dropdown-item">
                                    <div class="notification">
                                        <div class="notification-content"><i class="fa fa-cog"></i>Setting</div>
                                    </div>
                                </a>
                                <hr>
                            </li> --}}
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Log Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            
                        </ul>
                    </li>
                </ul> 
            </div>
        </nav>
    </header>

<!--====================================================
                        PAGE CONTENT
======================================================-->
    <div class="page-content d-flex align-items-stretch">

        @include('AdminPages.AdminMenu.admin_menu')

        <div class="content-inner">

                @if(count($errors))
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif

            @yield('content')

        </div>
    </div> 

</body>

    <!--Global Javascript -->
    <script type="text/javascript" src="{{ URL::asset('businessbox/admin/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('businessbox/admin/js/popper/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('businessbox/admin/js/tether.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('businessbox/admin/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('businessbox/admin/js/jquery.cookie.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('businessbox/admin/js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('businessbox/admin/js/chart.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('businessbox/admin/js/front.js') }}"></script>
    
    <!--Core Javascript -->
    <script type="text/javascript" src="{{ URL::asset('businessbox/admin/js/mychart.js') }}"></script>
</html>