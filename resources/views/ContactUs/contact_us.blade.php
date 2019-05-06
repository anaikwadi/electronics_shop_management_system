@extends('layouts.layout')

@section('content')

    <!--====================================================
                           HOME-P
    ======================================================-->
        <div id="home" class="home-p pages-head4 text-center">
          <div class="container">
            <h1 class="wow fadeInUp" data-wow-delay="0.1s">Contact Us</h1>
          </div><!--/end container-->
        </div> 
    
    <!--====================================================
                            CONTACT-P1  
    ======================================================--> 
   <br>   <br>
        <section id="contact-p1" class="col-md-12">
          <div class="container">
            <div class="row">
              <div class="col-md-8">
                <div class="contact-p1-cont">
                  <h3>SAI ELECTRONICS & HOME APPLIANCES. </h3>
                  <div class="heading-border-light"></div> 
                  <p align="justify">
                    SAI ELECTRONICS is a leading destination for online shopping in India, 
                    offering some of the best prices and a completely hassle-free experience with options of paying through Cash on Delivery, 
                    Debit Card, Credit Card and Net Banking processed through secure and trusted gateways.
                  </p>
                  <p align="justify"> 
                    Now shop for your favourite Televisions, Refrigerators, Air-Conditioners, Washing Machines, Kitchen Appliances
                    and products from a host of other categories available.
                    Browse through our electronics brands featured on our site with expert descriptions to help you arrive at the right buying decision.
                    <br>Get the best prices and the best online shopping experience every time guaranteed.
                  </p>
                </div>
              </div>
              <div class="col-md-4"> 
                <div class="contact-p1-cont2"> 
                  <address class="address-details-f">
                    S/G No. 151/60, Opp. Malpani Plaza, <br>
                    Janata Raja Road, Vidya Nagar, <br>
                    Sangamner - 422 605 <br>
                    Phone: +91 77 09 161 143 / +91 77 44 050 516 <br>
                    Email: <a href="mailto:electronicsai1@gmail.com" class="">electronicsai1@gmail.com</a>
                  </address>
                  <ul class="list-inline social-icon-f top-data">
                    <li><a href="#" target="_empty"><i class="fa top-social fa-facebook" style="height: 35px; width:35px; line-height: 35px;"></i></a></li>
                    <li><a href="#" target="_empty"><i class="fa top-social fa-twitter" style="height: 35px; width:35px; line-height: 35px;"></i></a></li>
                    <li><a href="#" target="_empty"><i class="fa top-social fa-google-plus" style="height: 35px; width:35px; line-height: 35px;"></i></a></li> 
                  </ul>
                </div>
              </div>  
            </div>
          </div>
        </section>
    
    <!--====================================================
                            CONTACT-P2 
    ======================================================-->
    <form class="form-signin" method="POST" action="{{ route('contact.store') }}">
      {{ csrf_field() }}
       
        <service class="contact" id="contact">
          <div class="container">
              <div class="row con-form">
                <div class="col-md-4">
                  <input type="text" name="contact_us_full_name" placeholder="Full Name" class="form-control" required>
                </div>
                <div class="col-md-4">
                  <input type="text" name="contact_us_mobile" placeholder="Mobile Number" class="form-control" required>
                </div>
                <div class="col-md-4">
                  <input type="text" name="contact_us_email" placeholder="Email Id" class="form-control" required>
                </div>                
                <div class="col-md-12"><textarea name="contact_us_enquiry_query" placeholder="Enquiry Query" id="" required></textarea></div>

                <div class="col-md-12 sub-but">
                  <button type="submit" class="btn btn-general btn-white">Send</button>
                </div>
                
              </div>
          </div>
        </service>
       
      </form>
    
    <!--====================================================
                           MAP
    ======================================================--> 

    <section id="contact-add">
        <div id="map">
          <div class="map-responsive">
              {!! $Contact_us_map->iframe !!}
            </div>
        </div> 
      </section>

@endsection