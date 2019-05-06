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
                  TESTIMONIALS-P1
======================================================-->
 
  <div class="overlay-testimonials-p1"></div>
  <section id="testimonials-p1" class="bg-parallax testimonials-p1-bg">
    <div class="container-fluid">
      <div class="row">
        {{-- <div class="col-md-8"></div> --}}
        <div class="col-md-2"></div>
        <div class="col-md-8 bg-gradiant testimonials-p1-pos">
          <div class="testimonials-p1-cont">
            <div id="customers-testimonials" class="text-center owl-carousel owl-theme">


              @foreach($Testimonials as $test)
              <div class="testimonial">
                  <img src="{{ URL::asset(str_replace('"', '', $test->image_path)) }}" alt="testimonial" class="img-fluid rounded-circle">
                  <blockquote>
                      <p>
                        {{ $test->quote }}
                      </p>
                  </blockquote>
                  <div class="testimonial-author">
                      <p>
                          <strong>Name : {{ $test->name }}</strong>
                          <span>Designation : {{ $test->designation }} </span><br>
                          <span>Organization Name : {{ $test->company_name }}</span>
                      </p>
                  </div>
              </div>
              @endforeach
            </div>              
          </div>
        </div>
        <div class="col-md-2"></div>

      </div>
    </div>
  </section> 

<!--====================================================
                    TESTIMONIALS-P2
======================================================-->
  <section id="client" class="client testimonials-p2">
    <div class="container"> 
      <div class="row">

        @foreach($Testimonials as $test)
        <div class="col-md-6 col-sm-12">
          <div class="client-cont">
            <img src="img/client/avatar-6.jpg" class="img-fluid" alt="">
            <h5>{{ $test->name }}</h5>
            <h6>{{ $test->designation }} - {{ $test->company_name }}</h6>
            <i class="fa fa-quote-left"></i>
            <p>{{ $test->quote }}</p>
          </div>
        </div>
        @endforeach

        {{-- <div class="col-md-6 col-sm-12">
          <div class="client-cont">
            <img src="img/client/avatar-2.jpg" class="img-fluid" alt="">
            <h5>Dec Bol</h5>
            <h6>TEMS founder</h6>
            <i class="fa fa-quote-left"></i>
            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece.</p>
          </div>
        </div> --}}

      </div>
    </div>        
  </section> 
  
  @endsection
