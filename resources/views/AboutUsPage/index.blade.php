@extends('layouts.layout')

@section('content')

   
<!--====================================================
                       HOME-P
======================================================-->
<div id="home" class="home-p pages-head2 text-center">
    <div class="container">
      <h1 class="wow fadeInUp" data-wow-delay="0.1s"> {{ $title }}</h1>
    </div><!--/end container-->
  </div> 

<!--====================================================
                      CAREER-P1
======================================================-->

  <section id="about" class="career-p1 about">
      
    <div class="container">
      <div class="row"> 
        <div class="col-md-6" >
          <div class="career-p1-himg" >
            <img src="{{ URL::asset('businessbox/img/image-4.jpg') }}" class="img-fluid wow fadeInUp" data-wow-delay="0.1s" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="career-p1-desc">
            <h4>{{ $about_us->title}}</h4>
            <div class="heading-border-light"></div>
                <p align="justify" class="wow fadeInUp" data-wow-delay="0.4s">
                        {{ $about_us->description }}
                </p> 
            {{-- <ul>
              <li><i class="fa fa-arrow-circle-o-right"></i> Champion the Mission.</li>
              <li><i class="fa fa-arrow-circle-o-right"></i> Great Career Options.</li>
              <li><i class="fa fa-arrow-circle-o-right"></i> Full flexiblity of life.</li> 
            </ul> --}}
          </div>
        </div>  
      </div>
    </div> 
  </section>  

<!--====================================================
                      CAREER-P2
======================================================-->
  <div class="overlay-career-p2"></div>
  <section id="thought" class="bg-parallax career-p2-bg">
    <div class="container">
      <div id="row" class="row title-bar-career-p2">
        <div class="col-md-4 ">
          <h1 >100%</h1>
        </div>  
        <div class="col-md-8 ">
          <p align="justify"  class="wow fadeInUp " data-wow-delay="0.4s">
            Businessbox will deliver value to all the stakeholders and will attain excellence and leadership through such delivery of value. We will strive to support the stakeholders in all activities related to us.
          </p>
        </div> 
      </div>
    </div>         
  </section> 

<!--====================================================
                     CAREER-P3
======================================================--> 
  <div class="overlay-career-p3"></div>
   <section id="career-p3">
     <div class="container-fluide">
       <div class="row career-p3-title">
        <div class="col-md-12">
         <h3 class="text-center">Our Business Process</h3>
        </div> 
       </div>
       <div class="row">
         <div class="col-md-3 col-sm-6">
           <div class="career-p3-cont text-center">
             <i class="fa fa-superpowers"></i>
             <h5>Plan</h5>
           </div>
         </div>
         <div class="col-md-3 col-sm-6">
           <div class="career-p3-cont text-center">
             <i class="fa fa-snowflake-o"></i>
             <h5>Seamless</h5>
           </div>
         </div>
         <div class="col-md-3 col-sm-6">
           <div class="career-p3-cont text-center">
             <i class="fa fa-send-o"></i>
             <h5>Care</h5>
           </div>
         </div>
         <div class="col-md-3 col-sm-6">
           <div class="career-p3-cont text-center">
             <i class="fa fa-sun-o"></i>
             <h5>Transit</h5>
           </div>
         </div>
         <div class="col-md-3 col-sm-6">
           <div class="career-p3-cont text-center">
             <i class="fa fa-crosshairs"></i>
             <h5>Vacation</h5>
           </div>
         </div>
         <div class="col-md-3 col-sm-6">
           <div class="career-p3-cont text-center">
             <i class="fa fa-gift"></i>
             <h5>Enjoy</h5>
           </div>
         </div>
         <div class="col-md-3 col-sm-6">
           <div class="career-p3-cont text-center">
             <i class="fa fa-plane"></i>
             <h5>Celebrate</h5>
           </div>
         </div>
         <div class="col-md-3 col-sm-6">
           <div class="career-p3-cont text-center">
             <i class="fa fa-life-buoy"></i>
             <h5>Contrary</h5>
           </div>
         </div>
       </div>
     </div>
   </section> 




<!--====================================================
                    CONTACT HOME
======================================================-->
<div class="overlay-contact-h"></div>
<section id="contact-h" class="bg-parallax contact-h-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="contact-h-cont">
          {{-- <h3 class="cl-white">Continue The Conversation</h3><br> --}}
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
        </div>
      </div>
    </div>
  </div>         
</section> 


   

@endsection