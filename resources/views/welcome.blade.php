


    @include('partials.header')


    <!--============= Banner Section Starts Here =============-->
    {{-- <section class="banner-section bg_img" >
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 col-xl-6">
                    <div class="banner-content cl-white">
                        <h5 class="cate">Best Bid Options</h5>
                        <h1 class="title"><span class="d-xl-block">Nunua Mali Poa,</span> Kwa bei yako!</h1>
                        <p>
                            Buy brand new products at your own price...
                        </p>
                        
                    </div>
                </div>
                <div class="d-none d-lg-block col-lg-6">
                    <div class="banner-thumb-2">
                        <img src="{{ asset('images/banner/banner.gif') }}" alt="banner">
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-shape d-none d-lg-block">
            <img src="{{ asset('css/img/banner-shape.png') }}" alt="css">
        </div>
    </section> --}}
    <!--============= Banner Section Ends Here =============-->

    <!-- Hero Section Begin -->
    <section class="home-hero-section ">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="hero-text">
                        <span>Best Bid Options</span>
                        <h2>Nunua Mali Poa, Kwa bei yako!<br /></h2>
                        <h3>Buy brand new products at your own price...</h3>
                        <a href="#current_auctions" class="btn custom-button mt-4 mb-4 scrollto">Start Bidding</a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 d-flex align-items-bottom">
                    <img class="img img-responsive" src="{{ asset('images/banner/products.gif') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- ======= Intro Section ======= -->
  {{-- <section id="intro">

    <div class="intro-text">      
        <div class="banner-content cl-white">

            <h5 class="cate">Best Bid Options</h5>
            <h1 class="title">Nunua Mali Poa, Kwa bei yako!</h1>            
            <p>
                Buy brand new products at your own price...
            </p>
            
        </div>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>

    <div class="product-screens justify-content-center">

      <div class="product-screen-1 wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="0.6s">
        <img src="{{ asset('images/how/how1.png') }}" class="img-fluid img-responsive" alt="">
      </div>

      

      <div class="product-screen-3 wow fadeInUp" data-wow-duration="0.6s">
        <img src="{{ asset('images/how/how3.png') }}" class="img-fluid img-responsive" alt="">
      </div>

    </div>

  </section> --}}
  
  <!-- End Intro Section -->   

               
        <!--============= All Auction Section Starts Here =============-->
        <section id="current_auctions" class="car-auction-section padding-bottom padding-top pos-rel oh">
            <div class="car-bg"><img src="{{ asset('images/banner/auctions_bg.png') }}" alt="car"></div>
            <div class="container">
                <div class="section-header-3">
                    <div class="left">
                        <div class="thumb">
                            {{-- <img src="{{ asset('images/header-icons/car-1.png') }}" alt="header-icons"> --}}
                        </div>
                        <div class="title-area">
                            <h2 class="title">Our Active Auctions</h2>
                            <p>We offer affordable Bikes, Phone's and Vouchers</p>
                        </div>
                    </div>
                    {{-- <a href="/bikes-all" class="normal-button">View All Bikes</a> --}}
                </div>
                <div class="row justify-content-center mb-30-none">
                @foreach($item as $bid)
                @if($bid->status == 'available')
                    <div class="col-sm-10 col-md-6 col-lg-4">        
                    
                        <div class="auction-item-2">
                            <div class="auction-thumb">
                                <form action="/item-details" method="POST">
                                    @csrf
                                    <input type="hidden" name="item_unique_id" value="{{ $bid->item_unique_id }}">
                                    @if($bid->item_category == 'BIKE')
                                    <button style="border: none; background:none; padding:0; margin:0;" type="submit"><img src="{{ asset('images/auction/bike.jpeg') }}" alt="popular"></button>
                                    @endif
                                    @if($bid->item_category == 'PHONE')
                                    <button style="border: none; background:none; padding:0; margin:0;" type="submit"><img src="{{ asset('images/auction/phone.jpeg') }}" alt="popular"></button>
                                    @endif
                                    @if($bid->item_category == 'VOUCHER')
                                    <button style="border: none; background:none; padding:0; margin:0;" type="submit"><img src="{{ asset('images/auction/voucher.png') }}" class="align-middle" alt="popular"></button>                                     
                                    @endif                                
                                </form>                             
                                
                            </div>
                            
                            <div class="auction-content">
                                <h6 class="title">
                                    <form action="/item-details" method="POST">
                                        @csrf
                                        <input type="hidden" name="item_unique_id" value="{{ $bid->item_unique_id }}">
                                    <button style="border: none; background:none; padding:0; margin:0;"  type="submit" >{{ $bid->item_name }}</button>
                                </form>
                                </h6>
                                <p>{{ $bid->item_description }}</p>
                                <div class="bid-area">                                    
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-money"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Retail Price</div>
                                            <div class="amount">KES {{ $bid->retail_price }}</div>
                                        </div>
                                    </div>
                                    <div class="bid-amount">
                                        <div class="countdown-area text-center">
                                            <div class="countdown">
                                                <div class="current">Ending In:</div> 
                                                <div id="timer-3" data-countdown="{{ $bid->bid_end_date }}"></div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                
                                <div>
                                    <p>
                                        <div class="card-title text-center">
                                            <h4>Bid Via Paybill</h4>
                                            </div>
                                        <div class="card card-body ">
                                           <p>Send just Ksh 20 to <strong style="font-size: 1.2rem;">337575</strong> with <strong style="font-size: 1.2rem;">{{ $bid->item_keyphrase }}</strong> and your bid amount as the account number eg <br><strong style="font-size: 1.2rem">{{ $bid->item_keyphrase }} 310</strong> to bid Ksh 310.</p> 
                                        </div>
                                        <br>
                                        <div class="row ">                                            
                                            <div class="col-lg-12 justify-content-center align-items-center text-center">
                                                <a class="btn custom-button" data-toggle="collapse" href="#onlineCollapse{{ $loop->iteration }}" role="button" aria-expanded="false" aria-controls="multiCollapseExample2">Or Bid Via Online </a>
                                            </div>
                                        </div>                                                                                
                                        
                                      </p>
                                      <div class="row">
                                        
                                        <div class="col-12">
                                          <div class="collapse multi-collapse" id="onlineCollapse{{ $loop->iteration}}">
                                            <div class="card card-body">
                                                Or bid online! Have your phone unlocked and ready to pay Ksh 20.
                                                <br>
                                                <div class="text-center">
                                                    <form action="/place/bid" method="POST">
                                                        @csrf
                                                        <label for="bid_amount">Amount</label>
                                                        <input name="bid_amount" class="form-input" type="text">
                                                        <label for="phone_number">Phone Number</label>
                                                        @if (Auth::user())
                                                            <input name="phone_number" value="{{ Auth::user()->phone_number }} " placeholder="{{ Auth::user()->phone_number }}" class="form-input text-center" type="text" readonly>
                                                            @else
                                                            <input name="phone_number" class="form-input" type="text">                                        
                                                            @endif                                                        
                                                        <input name="auction_id" value="{{ $bid->auction_id }}" class="form-input" type="hidden">
                                                        <input name="item_name" value="{{ $bid->item_name }}" class="form-input" type="hidden">
                                                        <input name="item_keyphrase" value="{{ $bid->item_keyphrase}}" class="form-input" type="hidden">
                                                        <input name="item_category" value="{{ $bid->item_category}}" class="form-input" type="hidden">
                                                        <input name="item_unique_id" value="{{ $bid->item_unique_id}}" class="form-input" type="hidden">
                                                        <br>
                                                        <button type="submit" class="custom-button">Submit a bid</button>
                                                    </form>
                                                    </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                <br>
                                
                               
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                    @endif
                    @endforeach
                    
                </div>
            </div>
        </section>
        <!--============= All Auctions Section Ends Here =============-->
    </div>

    <!-- ============================================-->
      <!-- <section> begin ============================-->
        <section class="py-md-0 pt-3 pb-3 bg-warning-gradient">

            <div class="container">
              <div class="row flex-center">
                <div class="col-md-6"> <img class="w-100 w-lg-75 d-none d-md-block cta-img" src="{{ asset('images/partner.jpeg') }}" width="320" alt="cta" /></div>
                <div class="col-md-6 my-auto align-items-center">
                  <h2 class="fw-bold fs-4 fs-lg-5 fs-xl-6 mb-4 text-primary"> Want to collaborate with the us?</h2><a class="btn hover-top btn-collab" href="/partner">JOIN OUR TEAM</a>
                </div>
              </div>
            </div>
            <!-- end of .container-->
    
          </section>
          <!-- <section> close ============================-->
          <!-- ============================================-->
    
    
    <!--============= Client Section Starts Here =============-->
{{-- 
    <section class="client-section padding-top padding-bottom">
        <div class="container">
            <div class="section-header">
                <h2 class="title">Don’t just take our word for it!</h2>
                <p>Our hard work is paying off. Great reviews from amazing customers.</p>
            </div>
            <div class="m--15">
                <div class="client-slider owl-theme owl-carousel">
                    <div class="client-item">
                        <div class="client-content">
                            <p>I can't stop bidding! It's a great way to spend some time and I want everything on BidLeo.</p>
                        </div>
                        <div class="client-author">
                            <div class="thumb">
                                <a href="#0">
                                    <img src="{{ asset('images/client/client01.png') }}" alt="client">
                                </a>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="#0">Alexis Moore</a></h6>
                                <div class="ratings">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="client-item">
                        <div class="client-content">
                            <p>I came I saw I won. Love what I have won, and will try to win something else.</p>
                        </div>
                        <div class="client-author">
                            <div class="thumb">
                                <a href="#0">
                                    <img src="{{ asset('images/client/client02.png') }}" alt="client">
                                </a>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="#0">Darin Griffin</a></h6>
                                <div class="ratings">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="client-item">
                        <div class="client-content">
                            <p>This was my first time, but it was exciting. I will try it again. Thank you so much.</p>
                        </div>
                        <div class="client-author">
                            <div class="thumb">
                                <a href="#0">
                                    <img src="{{ asset('images/client/client03.png') }}" alt="client">
                                </a>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="#0">Tom Powell</a></h6>
                                <div class="ratings">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!--============= Client Section Ends Here =============-->


    <!--============= Footer Section Starts Here =============-->
    @include('partials.footer')
    <!--============= Footer Section Ends Here =============-->

</body>
<!-- Mirrored from www.pixner.net/BidLeo/main// by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Apr 2021 09:09:46 GMT -->
</html>
