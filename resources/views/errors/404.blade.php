@extends('layouts.authentication') 

@section('content')



<!--====================================================
                        PAGE CONTENT
======================================================--> 
    <section class="hero-area">
        <div class="overlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-md-12 ">
                <div class="block text-center">
                    <h1 class="animated wow fadeInLeft" data-wow-delay="0.3s" data-wow-duration=".2s">404!</h1>
                    <p class="animated wow fadeInRight" data-wow-delay="0.5s" data-wow-duration=".5s">Oops! Page Not Found Something Wrong.</p>
                    <div class="animated wow fadeInUp text-center" data-wow-delay="0.7s" data-wow-duration=".7s">
                      <span>
                        <a class="btn btn-general btn-blue" href="{{ URL::to('/dashboard') }}" role="button">Go to Home</a> 
                      </span>
                    </div>
                </div>
            </div>
          </div>  
        </div>
    </section>

@endsection