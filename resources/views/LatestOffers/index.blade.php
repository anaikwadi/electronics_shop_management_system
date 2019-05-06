@extends('layouts.layout')

@section('content')

 
<!--====================================================
                         HOME
======================================================-->
<div id="home"></div>
<section id="home-shop">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url({{ URL::asset('businessbox/img/shop/shop-banner-1.jpg') }})">
          <div class="carousel-caption d-none d-md-block">
            <h3>{{ $title }}</h3>
             
          </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url({{ URL::asset('businessbox/img/shop/shop-banner-2.jpg') }})">
          <div class="carousel-caption d-none d-md-block">
            <h3>{{ $title }}</h3>
          </div>
        </div> 
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </section>

<!--====================================================
                        SHOP-P1
======================================================--> 
<section id="shop-p1" class="shop-p1">
    <div class="container">
      <div class="row">
          @if (Auth::check())
          <a  href="{{route('user_add_cart.index')}}" class="btn btn-outline-success btn-lg pull-right" href=""> Checkout</a>
          @endif
        <div class="col-lg-12"> 
          <div class="row">

            @foreach($latest_offers as $offer)
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card ">
                <a href="{{ URL::to('/latest_offer_details/'.$offer->id) }}">
                        @foreach($first_image as $img)
                            @if($img->latest_offer_id == $offer->id)
                                <img class="card-img-top" src="{{ URL::asset(str_replace('"', '', $img->file_path_db)) }}" height="250" width="200" alt="">
                                @break
                            @endif
                        @endforeach
                </a>
                <div class="card-body text-center">
                  <div class="card-title">
                    <a href="{{ URL::to('/latest_offer_details/'.$offer->id) }}">
                        @foreach($purchase_items as $item)
                            @if($item->id == $offer->item_id)
                                {{ $item->company_name }} => {{ $item->model_name }}
                            @endif
                        @endforeach
                    </a>
                  </div>
                  <strong> Price : <strike> {{ $offer->display_price }} <i class="fa fa-inr"></i>  </strike> </strong> <br>
                  <strong>Offer Price : {{ $offer->offer_price }} <i class="fa fa-inr"></i> </strong>
                  <div class="cart-icon text-center">
                    {{-- <a href="#"><i class="fa fa-cart-plus"></i> Add to Cart</a> --}}
                    <a class="pull-left" href="{{ URL::to('/latest_offer_details/'.$offer->id) }}"> Details <i class="fa fa-eye"></i> </a>

                    @php $flag = 0; @endphp
                    @if (Auth::check())
                        @foreach($cart_items as $item)
                            @if($item->user_id == Auth::User()->id && $item->item_id == $offer->item_id)
                                @php $flag = 1; @endphp
                            @endif
                        @endforeach
                    @endif

                    @if($flag == 1)
                    <a class="pull-right" class="btn btn-outline-success" disabled> Already Added <i class="fa fa-cart-plus"></i> </a>
                    @else
                     {{-- add_to_cart_modal.blade include Start --}}
                     @include('LatestOffers.add_to_cart_modal')
                     {{-- add_to_cart_modal.blade End --}}  
                    <a class="pull-right" class="btn btn-outline-warning" data-toggle="modal" data-target="#add_to_cart_modal{{$offer->id}}" href="{{ URL::to('/latest_offer_details/'.$offer->id) }}"> Add To Cart <i class="fa fa-cart-plus"></i> </a>  
                    @endif


                  </div>
                </div>
              </div>
            </div>
            @endforeach
              
          </div>
        </div> 

                {{-- <div class="col-lg-12"> 
                        <div class="row">
                                <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel"> 
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                        <img class="d-block img-fluid" src="{{ URL::asset('businessbox/img/shop/shop-banner-4.jpg') }}" alt="First slide">
                                        </div>
                                        <div class="carousel-item">
                                        <img class="d-block img-fluid" src="{{ URL::asset('businessbox/img/shop/shop-banner-3.jpg') }}" alt="Second slide">
                                        </div> 
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                            </div>
                        </div>
                </div> --}}
      </div> 
    </div>
  </section>
    
   
    
   

@endsection