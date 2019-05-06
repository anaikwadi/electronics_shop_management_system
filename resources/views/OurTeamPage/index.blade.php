@extends('layouts.layout')

@section('content')

   <!--====================================================
                       HOME-P
======================================================-->
<div id="home" class="home-p pages-head1 text-center">
    <div class="container">
    <h1 class="wow fadeInUp" data-wow-delay="0.1s"> {{ $title }}</h1>
      {{-- <p>Discover more about Team</p> --}}
    </div><!--/end container-->
  </div> 

<!--====================================================
                    TEAM-P1
======================================================-->

  <section id="team-p1" class="team-p1">
      <div class="container">
          <div class="row">
            <div class="col-md-4 col-sm-6  desc-comp-offer">
              <h2>Team Member</h2>
              <div class="heading-border-light"></div> 
            </div>
          </div>  

    <div class="container">
      <div class="row">
             

        @foreach($OurTeam as $member)
         <div class="col-md-4">
           <div class="team-p1-cont wow fadeInUp" data-wow-delay="0.3s">
             <center>
               <img src="{{ URL::asset(str_replace('"', '', $member->profile_image)) }}" class="img-fluid" alt="...">
             </center>
              <h5>Name : {{ $member->name }}</h6>
              <h6>Mobile : {{ $member->mobile }}</h6>
              <h6>Email : {{ $member->email }}</h6>
              <h6>Designation : {{ $member->designation }}</h6>
             <ul class="list-inline social-icon-f top-data">
                <li><a href="{{ $member->facebook }}" target="_empty"><i class="fa top-social fa-facebook"></i></a></li>
              </ul>
            </div>
         </div>
         @endforeach
      </div>
    </div>      
  </section> 


@endsection