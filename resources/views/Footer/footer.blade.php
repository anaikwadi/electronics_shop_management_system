
<!--====================================================
                      FOOTER
======================================================--> 
<footer> 
        <div id="footer-s1" class="footer-s1">
          <div class="footer">
            <div class="container">
              <div class="row">
                <!-- About Us -->
                <div class="col-md-3 col-sm-6 ">
                  <div><img src="{{ URL::asset('businessbox/img/logo-w.png') }}" alt="" class="img-fluid"></div>
                  <ul class="list-unstyled comp-desc-f">
                     <li>
                          <p align="justify"> 
                              Now shop for your favourite Televisions, Refrigerators, Air-Conditioners, Washing Machines, Kitchen Appliances
                              and products from a host of other categories available.
                              Browse through our electronics brands featured on our site with expert descriptions to help you arrive at the right buying decision.
                            </p>
                      </li> 
                  </ul><br> 
                </div>
                <!-- End About Us -->

                <!-- Recent News -->
                <div class="col-md-3 col-sm-6 ">
                  <div class="heading-footer"><h2>Useful Links</h2></div>
                  <ul class="list-unstyled link-list">
                    <li><a href="{{route('about_us_page.index')}}">About us</a><i class="fa fa-angle-right"></i></li> 
                    <li><a href="{{route('home_latest_offer.index')}}">Latest Offer</a><i class="fa fa-angle-right"></i></li> 
                    <li><a href="faq.html">FAQ</a><i class="fa fa-angle-right"></i></li> 
                    <li><a href="{{route('contact.index')}}">Contact us</a><i class="fa fa-angle-right"></i></li>
                    @if (Auth::check())
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out <br> [ {{ Auth::User()->email }} ]</a><i class="fa fa-angle-right"></i></li> 

                        {{-- <li class="nav-item" ><a class="nav-link smooth-scroll" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a></li> --}}
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @else
                    <li><a  href="{{url('login')}}">Login</a><i class="fa fa-angle-right"></i></li> 
                    @endif
                    
                  </ul>
                </div>
                <!-- End Recent list -->

                <!-- Recent Blog Entries -->
                <div class="col-md-3 col-sm-6">
                    <div class="heading-footer"><h2>Get In Touch</h2></div>
                    <address class="address-details-f">
                        S/G No. 151/60, Opp. Malpani Plaza, <br>
                        Janata Raja Road, Vidya Nagar,  <br>
                        Sangamner - 422 605 <br>
                      Phone: +91 77 09 161 143 / +91 77 44 050 516  <br>
                      Email: <a href="mailto:electronicsai1@gmail.com" class="">electronicsai1@gmail.com</a>
                    </address>  
                    <ul class="list-inline social-icon-f top-data">
                      <li><a href="#" target="_empty"><i class="fa top-social fa-facebook"></i></a></li>
                      <li><a href="#" target="_empty"><i class="fa top-social fa-twitter"></i></a></li>
                      <li><a href="#" target="_empty"><i class="fa top-social fa-google-plus"></i></a></li> 
                    </ul>
                  </div>
                <!-- End Recent Blog Entries -->

                <!-- Latest Tweets -->                     
                <div class="col-md-3 col-sm-6">
                  <div class="heading-footer"><h2>Get In Touch</h2></div>
                  {{-- <address class="address-details-f"> --}}
                      <form class="form-signin" method="POST" action="{{ route('contact.store') }}">
                          {{ csrf_field() }}
                      <div class="row con-form">
                          <div class="col-md-12">
                            <input type="text" name="contact_us_full_name" placeholder="Full Name" class="form-control" required>
                          </div>
                      </div>
                      <div class="row con-form">
                          <div class="col-md-12">
                            <input type="text" name="contact_us_mobile" placeholder="Mobile Number" class="form-control" required>
                          </div>
                      </div>
                      <div class="row con-form">
                          <div class="col-md-12">
                            <input type="text" name="contact_us_email" placeholder="Email Id" class="form-control" required>
                          </div>                
                      </div>
                      <div class="row">
                          <div class="col-md-12"><textarea rows="5" cols="29" name="contact_us_enquiry_query" placeholder="Enquiry Query" id="" required></textarea></div>
                      </div>  
                      <div class="row">
                          <div class="col-md-12 sub-but">
                            <button type="submit" class="btn btn-general btn-white pull-right">Send</button>
                          </div>
                      </div>
                    </form>
                  {{-- </address> --}}
                </div>
                <!-- End Latest Tweets -->
              </div>
            </div><!--/container -->
          </div> 
        </div>

        <div id="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="footer-copyrights">
                            <p>Copyrights &copy; 2018 Shivshree Development Studio. All rights reserved.</p>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <a href="#home" id="back-to-top" class="btn btn-sm btn-green btn-back-to-top smooth-scrolls hidden-sm hidden-xs" title="home" role="button">
            <i class="fa fa-angle-up"></i>
        </a>
    </footer>