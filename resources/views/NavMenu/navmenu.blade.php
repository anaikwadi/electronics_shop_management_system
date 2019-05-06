

<!--====================================================
                         HEADER
======================================================--> 

<header>
      
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav" data-toggle="affix">
          <div class="container">
            <a class="navbar-brand smooth-scroll" href="{{ URL::to('/') }}">
              {{-- <img src="{{ URL::asset('businessbox/img/logo-s.png') }}" alt="logo"> --}}
              <b> SAI ELECTRONICS </b>
            </a> 
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> 
                  <span class="navbar-toggler-icon"></span>
            </button>  
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item" ><a class="nav-link smooth-scroll" href="{{ URL::to('/') }}">Home</a></li>
                  <li class="nav-item dropdown" >
                    <a class="nav-link dropdown-toggle smooth-scroll" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About</a> 
                    <div class="dropdown-menu dropdown-cust" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="{{route('about_us_page.index')}}">About Us</a>
                      {{-- <a class="dropdown-item" href="careers.html">Career Oprtunity</a> --}}
                      <a class="dropdown-item" href="{{route('team.index')}}">Meet Our Team</a>
                      {{-- <a class="dropdown-item" href="faq.html">FAQ</a> --}}
                      <a class="dropdown-item" href="{{route('testimonial_page.index')}}">Testimonials</a>
                    </div>
                  </li>
                  {{-- <li class="nav-item" ><a class="nav-link smooth-scroll" href="services.html">Services</a></li>  --}}
                  <li class="nav-item" ><a class="nav-link smooth-scroll" href="{{route('home_latest_offer.index')}}">Latest Offers</a></li> 
                  
                  {{-- <li class="nav-item dropdown" >
                    <a class="nav-link dropdown-toggle smooth-scroll" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a> 
                    <div class="dropdown-menu dropdown-cust" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="news-list.html">News list layouts</a>
                      <a class="dropdown-item" href="news-grid.html">News grid layouts</a>
                      <a class="dropdown-item" href="news-details.html">News Details</a> 
                      <a class="dropdown-item" href="project.html">Project</a>
                      <a class="dropdown-item" href="contact.html">Contact Us</a>
                      <a class="dropdown-item" href="comming-soon.html">Comming Soon</a>
                      <a class="dropdown-item" href="pricing.html">Pricing Tables</a>
                      <a class="dropdown-item" href="admin/404.html">404</a>
                    </div>
                  </li> --}}

                  {{-- <li class="nav-item dropdown" >
                    <a class="nav-link dropdown-toggle smooth-scroll" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a> 
                    <div class="dropdown-menu dropdown-cust mega-menu" aria-labelledby="navbarDropdownMenuLink">
                      <div class="row">
                        <div class="col-md-5">
                          <a class="dropdown-item" href="shop.html">Shop Detail</a>
                          <a class="dropdown-item" href="single-product.html">Single Product</a>
                          <a class="dropdown-item" href="cart.html">Cart</a>
                          <a class="dropdown-item" href="checkout.html">Checkout</a>
                          <a class="dropdown-item" href="myaccount.html">Myaccount</a>
                        </div>
                        <div class="col-md-7 mega-menu-img m-auto text-center pl-0">
                          <a href="#"><img src="{{ URL::asset('businessbox/img/offer_icon.png') }}" alt="" class="img-fluid"></a>
                        </div>
                      </div>
                    </div>
                  </li> --}}

                  <li class="nav-item" ><a class="nav-link smooth-scroll" href="{{route('contact.index')}}">Contact Us</a></li>

                  @if (Auth::check())
                      {{-- <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Log Out</a> --}}
                      <li class="nav-item" ><a class="nav-link smooth-scroll" href="{{ URL::to('/dashboard') }}" target="_blank">Dashboard</a></li>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  @else
                  <li class="nav-item" ><a class="nav-link smooth-scroll" href="{{url('login')}}" target="_blank">Login</a></li> 
                  @endif
                  {{-- <li>
                    <i class="search fa fa-search search-btn"></i>
                    <div class="search-open">
                      <div class="input-group animated fadeInUp">
                        <input type="text" class="form-control" placeholder="Search" aria-describedby="basic-addon2">
                        <span class="input-group-addon" id="basic-addon2">Go</span>
                      </div>
                    </div>
                  </li>  --}}
                  
              </ul>  
            </div>
          </div>
        </nav>
      </header> 