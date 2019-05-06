@extends('layouts.layout')

@section('content')


<!--====================================================
                         HOME
======================================================-->

<section id="home">

      <div class="timeline-body">
          <div class="embed-responsive embed-responsive-16by9">
            <div id="player"></div>
            <script src="//www.youtube.com/iframe_api"></script>
        </div>
      </div>
    
    <script>
        /**
         * Put your video IDs in this array
         */
        var videoIDs = [
          @foreach($videos as $video)
          '{{ $video->url }}',
          @endforeach
        ];
    
        var player, currentVideoId = 0;
    
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('player', {
                height: '350',
                width: '425',
                playerVars: {
                  start: 2,
                  loop: 1,
                  controls: 0,
                  modestbranding: 0,
                  playlist: videoIDs,
                  rel: '0',
                },
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                }
            });
        }
        
        function onPlayerReady(event) {
          event.target.loadVideoById(videoIDs[currentVideoId]);
            player.mute();
        }
    
        function onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.ENDED) {
                currentVideoId++;
                if (currentVideoId < videoIDs.length) {
                    player.loadVideoById(videoIDs[currentVideoId]);
                }
            }
        }
    </script>
     
</section> 


<!--====================================================
                        ABOUT
======================================================-->
<section id="about" class="about">
    <div class="container">
      <div class="row title-bar">
        <div class="col-md-12">
          <h1 class="wow fadeInUp">{{ $about_us->title}}</h1>
          <div class="heading-border"></div>
          <p class="wow fadeInUp" data-wow-delay="0.4s">
              {{ $about_us->description }}
          </p>
          {{-- <div class="title-but"><button class="btn btn-general btn-green" role="button">Read More</button></div> --}}
        </div>
      </div>
    </div>  
    <!-- About right side withBG parallax -->
    <div class="container-fluid">
      <div class="row"> 
        @foreach($container_data as $data)
        <div class="col-md-4 bg-{{ $data->bg_color }}">
          <div class="about-content-box wow fadeInUp" data-wow-delay="0.3s">
            <i class="fa {{ $data->fa_icon }}"></i>
            <h5>{{ $data->title }}</h5>
            <p class="desc">{{ $data->description }}</p>
          </div>
        </div> 
        @endforeach
      </div> 
    </div>       
  </section> 

<!--====================================================
                      OFFER
======================================================-->
  <section id="comp-offer">
    <div class="container-fluid">
      <div class="row">
        {{-- <div class="col-md-3 col-sm-6 desc-comp-offer wow fadeInUp" data-wow-delay="0.2s">
          <h2>What We Offer</h2>
          <div class="heading-border-light"></div> 
          <button class="btn btn-general btn-green" role="button">See Curren Offers</button>
          <button class="btn btn-general btn-white" role="button">Contact Us Today</button>
        </div> --}}

        @foreach($latest_offers as $offer)
        <div class="col-md-3 col-sm-6 desc-comp-offer wow fadeInUp" data-wow-delay="0.4s">
          <div class="desc-comp-offer-cont">
              <a href="{{ URL::to('/latest_offer_details/'.$offer->id) }}">
                <div class="thumbnail-blogs">
                    <div class="caption">
                      <i class="fa fa-chain"></i>
                    </div>
                    {{-- <img src="{{ URL::asset('businessbox/img/news/news-11.jpg') }}" class="img-fluid" alt="..."> --}}
                      @foreach($first_image as $img)
                          @if($img->latest_offer_id == $offer->id)
                              <img class="card-img-top" src="{{ URL::asset(str_replace('"', '', $img->file_path_db)) }}" height="250" width="200" alt="">
                              @break
                          @endif
                      @endforeach
                </div>
              </a>
            <h3>
                @foreach($purchase_items as $item)
                  @if($item->id == $offer->item_id)
                      {{ $item->company_name }} => {{ $item->model_name }}
                  @endif
              @endforeach
            </h3>
            <strong> Price : <strike> {{ $offer->display_price }} <i class="fa fa-inr"></i>  </strike> </strong> <br>
            <strong>Offer Price : {{ $offer->offer_price }} <i class="fa fa-inr"></i> </strong> 
            {{-- <p class="desc"> {{ $offer->description }} </p> --}}
            {{-- <a href="#"><i class="fa fa-arrow-circle-o-right"></i> Learn More</a> --}}
            <a href="{{ URL::to('/latest_offer_details/'.$offer->id) }}"> Details <i class="fa fa-eye"></i> </a>
          </div>
        </div>
        @endforeach

        {{-- <div class="col-md-3 col-sm-6 desc-comp-offer wow fadeInUp" data-wow-delay="0.6s">
          <div class="desc-comp-offer-cont">
            <div class="thumbnail-blogs">
                <div class="caption">
                  <i class="fa fa-chain"></i>
                </div>
                <img src="{{ URL::asset('businessbox/img/news/news-13.jpg') }}" class="img-fluid" alt="...">
            </div>              
            <h3>Leadership Development</h3>
            <p class="desc">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC. </p>
            <a href="#"><i class="fa fa-arrow-circle-o-right"></i> Learn More</a>
          </div>
        </div> --}}

      </div>
    </div>
  </section>

<!--====================================================
                   WHAT WE DO
======================================================-->
  <section class="what-we-do bg-gradiant">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <h3>We Have Devices For</h3>
          <div class="heading-border-light"></div> 
          {{-- <p class="desc">We partner with clients to put recommendations into practice. </p> --}}
        </div>
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-4  col-sm-6">
              <div class="what-we-desc">
                <i class="fa fa-briefcase"></i>
                <h6>Kitchen Appliances</h6>
                {{-- <p class="desc">Contrary to popular belief, Lorem Ipsum is not simply random text. </p> --}}
              </div>
            </div>
            <div class="col-md-4  col-sm-6">
              <div class="what-we-desc">
                <i class="fa fa-shopping-bag"></i>
                <h6>Home Appliances</h6>
                {{-- <p class="desc">Contrary to popular belief, Lorem Ipsum is not simply random text. </p> --}}
              </div>
            </div>
            <div class="col-md-4  col-sm-6">
              <div class="what-we-desc">
                <i class="fa fa-building-o"></i>
                <h6>Speakers and Headsets</h6>
                {{-- <p class="desc">Contrary to popular belief, Lorem Ipsum is not simply random text. </p> --}}
              </div>
            </div>
            <div class="col-md-4  col-sm-6">
              <div class="what-we-desc">
                <i class="fa fa-bed"></i>
                <h6>Storage Devices</h6>
                {{-- <p class="desc">Contrary to popular belief, Lorem Ipsum is not simply random text. </p> --}}
              </div>
            </div>
            <div class="col-md-4  col-sm-6">
              <div class="what-we-desc">
                <i class="fa fa-hourglass-2"></i>
                <h6>Home Entertainment Systems</h6>
                {{-- <p class="desc">Contrary to popular belief, Lorem Ipsum is not simply random text. </p> --}}
              </div>
            </div>
            <div class="col-md-4  col-sm-6">
              <div class="what-we-desc">
                <i class="fa fa-cutlery"></i>
                <h6>Fitness Bands, Smart Watches and Personal Care</h6>
                {{-- <p class="desc">Contrary to popular belief, Lorem Ipsum is not simply random text. </p> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>      
  </section> 

<!--====================================================
                    STORY
======================================================--> 
  {{-- <section id="story">
      <div class="container">
        <div class="row title-bar">
          <div class="col-md-12">
            <h1 class="wow fadeInUp">Our Success Tranformation Story</h1>
            <div class="heading-border"></div> 
          </div>
        </div>
      </div>  
      <div class="container-fluid">
        <div class="row" >
          <div class="col-md-6" >
            <div class="story-himg" >
              <img src="{{ URL::asset('businessbox/img/image-4.jpg') }}" class="img-fluid" alt="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="story-desc">
              <h3>How to grow world with Us</h3>
              <div class="heading-border-light"></div> 
              <p>Everyone defines success differently – as much as there are people, there are different opinions. Number one in our priority list is the success of our students, alumni and their employers. We work hard in the name of the success of our alumni – being among the best and holding the high employment rate. Many desktop publishing packages and web page editors now use Lorem Ipsum.. </p>
              <p>You can find some thoughts on success from our students and alumni here – every story is unique, but this is what success is. Everybody sees it differently. Many desktop publishing packages and web page editors now use Lorem Ipsum.</p>
              <p class="text-right" style="font-style: italic; font-weight: 700;"><a href="#">Businessbox</a></p>
              <div class="title-but"><button class="btn btn-general btn-green" role="button">Read More</button></div>
            </div>
          </div>
        </div>
      </div>  
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s"> 
            <div class="story-descb">
                <img src="{{ URL::asset('businessbox/img/news/news-10.jpg') }}" class="img-fluid" alt="...">
                <h6>Virtual training systems</h6>
                <p>Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                <a href="#"><i class="fa fa-arrow-circle-o-right"></i> Read More</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s"> 
            <div class="story-descb">
                <img src="{{ URL::asset('businessbox/img/news/news-2.jpg') }}" class="img-fluid" alt="...">
                <h6>Design planning</h6>
                <p>Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                <a href=""><i class="fa fa-arrow-circle-o-right"></i> Read More</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.5s"> 
            <div class="story-descb">
                <img src="{{ URL::asset('businessbox/img/news/news-8.jpg') }}" class="img-fluid" alt="...">
                <h6>Remote condition monitoring</h6>
                <p>Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                <a href=""><i class="fa fa-arrow-circle-o-right"></i> Read More</a>
            </div>
          </div>                        
        </div>
      </div>  
  </section> --}}

<!--====================================================
                COMPANY THOUGHT
======================================================-->
  <div class="overlay-thought"></div>
  <section id="thought" class="bg-parallax thought-bg">
    <div class="container">
      <div id="thought-desc" class="row title-bar title-bar-thought owl-carousel owl-theme">
        <div class="col-md-12 ">
          <div class="heading-border bg-white"></div>
          <p class="wow fadeInUp" data-wow-delay="0.4s">
              Product offers and availability are subject to change. All prices are inclusive of taxes. Product colours & images are only for illustration and they may not exactly match with the actual product. Product specs are subject to change & may vary from actual product. While every care is taken to avoid inaccuracies in content, these are provided as is, without warranty of any kind.          
          </p>
          <h6>Rahul & Rohit</h6>
        </div>
        {{-- <div class="col-md-12 thought-desc">
          <div class="heading-border bg-white"></div>
          <p class="wow fadeInUp" data-wow-delay="0.4s">Ensuring quality in Businessbox is an obsession and the high quality standards set by us are achieved through a rigorous quality assurance process. Quality assurance is performed by an independent team of trained experts for each project. </p>
          <h6>Tom John</h6>
        </div> --}}
      </div>
    </div>         
  </section> 
  
<!--====================================================
                 SERVICE-HOME
======================================================--> 
  <section id="service-h">
      <div class="container-fluid">
        <div class="row" >
          <div class="col-md-6" >
            <div class="service-himg" > 
              <iframe src="https://www.youtube.com/embed/754f1w90gQU?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="service-h-desc">
              <h3>We are Providing Great Services</h3>
              <div class="heading-border-light"></div> 
              <p>
                  Launched in 2018, Its kind large format specialist retail store that catered to all multi-brand digital gadgets and home electronic needs in India. Synonyms for all electronics needs, with its tech-savvy staff, product range, online presence and the will to help customers.
              </p>  
            <div class="service-h-tab"> 
              <nav class="nav nav-tabs" id="myTab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-expanded="true">Developing</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile">Training</a> 
                <a class="nav-item nav-link" id="my-profile-tab" data-toggle="tab" href="#my-profile" role="tab" aria-controls="my-profile">Medical</a> 
              </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"><p>Nulla est ullamco ut irure incididunt nulla Lorem Lorem minim irure officia enim reprehenderit. Magna duis labore cillum sint adipisicing exercitation ipsum. Nostrud ut anim non exercitation velit laboris fugiat cupidatat. Commodo esse dolore fugiat sint velit ullamco magna consequat voluptate minim amet aliquip ipsum aute. exercitation ipsum. Nostrud ut anim non exercitation velit laboris fugiat cupidatat. Commodo esse dolore fugiat sint velit ullamco magna consequat voluptate minim amet aliquip ipsum aute. </p></div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                  <p>Nulla est ullamco ut irure incididunt nulla Lorem Lorem minim irure officia enim reprehenderit. Magna duis labore cillum sint adipisicing exercitation ipsum. Nostrud ut anim non exercitation velit laboris fugiat cupidatat. Commodo esse dolore fugiat sint velit ullamco magna consequat voluptate minim amet aliquip ipsum aute</p>
                </div> 
                <div class="tab-pane fade" id="my-profile" role="tabpanel" aria-labelledby="my-profile-tab">
                  <p>Nulla est ullamco ut irure incididunt nulla Lorem Lorem minim irure officia enim reprehenderit. Magna duis labore cillum sint adipisicing exercitation ipsum. Nostrud ut anim non exercitation velit laboris fugiat cupidatat. Commodo esse dolore fugiat sint velit ullamco magna consequat voluptate minim amet aliquip ipsum aute</p>
                </div> 
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>  
  </section>

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
                  CONTACT HOME
======================================================-->
  {{-- <div class="overlay-contact-h"></div>
  <section id="contact-h" class="bg-parallax contact-h-bg">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="contact-h-cont">
            <h3 class="cl-white">Continue The Conversation</h3><br>
            <form>
              <div class="form-group cl-white">
                <label for="name">Your Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter name"> 
              </div>  
              <div class="form-group cl-white">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"> 
              </div>  
              <div class="form-group cl-white">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" id="subject" aria-describedby="subjectHelp" placeholder="Enter subject"> 
              </div>  
              <div class="form-group cl-white">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="3"></textarea>
              </div>  
              <button class="btn btn-general btn-white" role="button"><i fa fa-right-arrow></i>GET CONVERSATION</button>
            </form>
          </div>
        </div>
      </div>
    </div>         
  </section>  --}}

<!--====================================================
                     NEWS
======================================================-->
  {{-- <section id="comp-offer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 col-sm-6  desc-comp-offer wow fadeInUp" data-wow-delay="0.2s">
          <h2>Latest News</h2>
          <div class="heading-border-light"></div> 
          <button class="btn btn-general btn-green" role="button">See More</button>
        </div>
        <div class="col-md-3 col-sm-6 desc-comp-offer wow fadeInUp" data-wow-delay="0.4s">
          <div class="desc-comp-offer-cont">
            <div class="thumbnail-blogs">
                <div class="caption">
                  <i class="fa fa-chain"></i>
                </div>
                <img src="{{ URL::asset('businessbox/img/news/news-1.jpg') }}" class="img-fluid" alt="...">
            </div>
            <h3>Pricing Strategies for Product</h3>
            <p class="desc">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from Business box. </p>
            <a href="#"><i class="fa fa-arrow-circle-o-right"></i> Learn More</a>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 desc-comp-offer wow fadeInUp" data-wow-delay="0.6s">
          <div class="desc-comp-offer-cont">
            <div class="thumbnail-blogs">
                <div class="caption">
                  <i class="fa fa-chain"></i>
                </div>
                <img src="{{ URL::asset('businessbox/img/news/news-9.jpg') }}" class="img-fluid" alt="...">
            </div>
            <h3>Design Exhibitions of 2017</h3>
            <p class="desc">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from Business box. </p>
            <a href="#"><i class="fa fa-arrow-circle-o-right"></i> Learn More</a>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 desc-comp-offer wow fadeInUp" data-wow-delay="0.8s">
          <div class="desc-comp-offer-cont">
            <div class="thumbnail-blogs">
                <div class="caption">
                  <i class="fa fa-chain"></i>
                </div>
                <img src="{{ URL::asset('businessbox/img/news/news-12.jpeg') }}" class="img-fluid" alt="...">
            </div>
            <h3>Exciting New Technologies</h3>
            <p class="desc">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from Business box. </p>
            <a href="#"><i class="fa fa-arrow-circle-o-right"></i> Learn More</a>
          </div>
        </div>
      </div>
    </div>
  </section> --}}


@endsection