@extends('layouts.layout')

@section('content')

 
<!--====================================================
                       HOME-P
======================================================-->
    <div id="home" class="home-p pages-head3 text-center">
        <div class="container">
          <h1 class="wow fadeInUp" data-wow-delay="0.1s">{{ $purchase_items->model_name}} {{ $title}}</h1>
        </div><!--/end container-->
      </div> 



<!--====================================================
                  SINGLE-PRODUCT-P1
======================================================--> 
    <section id="single-product-p1">
            <div class="container">  
                  <div class="wrapper row">
                    <div class="preview col-md-6">
                      
                      <div class="preview-pic tab-content">
                        @php $i = 0; @endphp

                        @foreach($images as $image)
                            @if($i == 0)
                                <div class="tab-pane active" id="{{$image->id}}"><img src="{{ URL::asset(str_replace('"', '', $image->file_path_db)) }}" /></div>
                            @else
                                <div class="tab-pane" id="{{$image->id}}"><img src="{{ URL::asset(str_replace('"', '', $image->file_path_db)) }}" /></div>
                            @endif
                        @php $i++; @endphp
                        @endforeach
                      </div>
                      <ul class="preview-thumbnail nav nav-tabs">
                            @php $i = 0; @endphp

                            @foreach($images as $image)
                                @if($i == 0)
                                    <li class="active"><a data-target="#{{$image->id}}" data-toggle="tab"><img src="{{ URL::asset(str_replace('"', '', $image->file_path_db)) }}" /></a></li>
                                @else   
                                    <li><a data-target="#{{$image->id}}" data-toggle="tab"><img src="{{ URL::asset(str_replace('"', '', $image->file_path_db)) }}" /></a></li>
                                @endif
                            @php $i++; @endphp
                        @endforeach
                      </ul>
                    </div>
                    <div class="details col-md-6">
                                <h3 class="product-title">{{ $purchase_items->model_name}}</h3>
                                <h5 class="product-title">{{ $purchase_items->company_name}}</h5>
                      <div class="rating">
                        <div class="stars">Ratings : 
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                        </div>
                        {{-- <span class="review-no">4 reviews</span> --}}
                      </div>
                      <h5 class="product-title">Description </h5>

                      <p class="product-description" style="word-wrap: break-word;min-width: 100%;max-width: 100%;">
                            {{ $latest_offers->description }}
                      </p>
                    <h4 class="price"> <font color="red"> Price:  {{ $latest_offers->display_price }} <i class="fa fa-inr"></i> </font>  </h4>
                      <h4 class="price">Offer Price: <span>{{ $latest_offers->offer_price }}</span> <i class="fa fa-inr"></i>  </h4>
                      {{-- <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p> --}}
                      {{-- <h5 class="sizes">sizes:
                        <span class="size" data-toggle="tooltip" title="small">s</span>
                        <span class="size" data-toggle="tooltip" title="medium">m</span>
                        <span class="size" data-toggle="tooltip" title="large">l</span>
                        <span class="size" data-toggle="tooltip" title="xtra large">xl</span>
                      </h5>
                      <h5 class="colors">colors:
                        <span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
                        <span class="color green"></span>
                        <span class="color blue"></span>
                      </h5>
                      <div class="action">
                      <div class="title-but"><button class="btn btn-general btn-white" role="button"><i class="fa fa-cart-plus"></i> Add to Cart</button></div>
                      </div> --}}
                    </div>
                    <div class="col-md-12">
                      <div class="service-h-tab"> 
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$latest_offers->video_link}}?autoplay=1" frameborder="0" allowfullscreen></iframe>
                            </div>                        
                      </div>
                  </div> 
            </div>
          </section>
          
  

  @endsection