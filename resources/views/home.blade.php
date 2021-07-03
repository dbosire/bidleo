


    @include('partials.header')


    <!--============= Banner Section Starts Here =============-->
    <section class="banner-section bg_img" >
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 col-xl-6">
                    <div class="banner-content cl-white">
                        <h5 class="cate">Best Bid Options</h5>
                        <h1 class="title"><span class="d-xl-block">Nunua Mali,</span> Kwa bei yako!</h1>
                        <p>
                            Buy brand new products at your own price...
                        </p>
                        
                    </div>
                </div>
                <div class="d-none d-lg-block col-lg-6">
                    <div class="banner-thumb-2">
                        <img src="{{ asset('images/banner/banner-3.png') }}" alt="banner">
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-shape d-none d-lg-block">
            <img src="{{ asset('css/img/banner-shape.png') }}" alt="css">
        </div>
    </section>
    <!--============= Banner Section Ends Here =============-->

    <!--============= Popular Auction Section Starts Here =============-->
    <section class="popular-auction padding-top pos-rel">
        <div class="popular-bg bg_img"></div>
        <div class="container">
            <div class="section-header cl-white">
                <span class="cate">Closing Within 24 Hours</span>
                <h2 class="title">Popular Auctions</h2>
                <p>Bid and win great deals,Our auction process is simple, efficient, and transparent.</p>
            </div>
            <div class="popular-auction-wrapper">
                <div class="row justify-content-center mb-30-none">
                @foreach($bids as $bid)
                @if($bid->item_category == 'BIKE')
                    <div class="col-lg-6">
                        <div class="auction-item-3">
                            <div class="auction-thumb">
                                <a href="product-details.html"><img src="{{ asset('images/auction/car/auction-1.jpg') }}" alt="popular"></a>
                                <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                            </div>
                            <div class="auction-content">
                                <h6 class="title">
                                    <a href="product-details.html">{{ $bid->item_name }}</a>
                                </h6>
                                <div class="bid-amount">
                                    <div class="icon">
                                        <i class="flaticon-auction"></i>
                                    </div>
                                    <div class="amount-content">
                                        <div class="current">Starting Bid</div>
                                        <div class="amount">{{ $bid->starting_bid }}</div>
                                    </div>
                                </div>
                                <div class="bids-area">
                                    Total Bids : <span class="total-bids">130 Bids</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach 
                @foreach($bids as $bid) 
                @if($bid->item_category == 'PHONE')
                    <div class="col-lg-6">
                        <div class="auction-item-3">
                            <div class="auction-thumb">
                                <a href="product-details.html"><img src="{{ asset('images/auction/jewelry/auction-2.jpg') }}" alt="popular"></a>
                                <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                            </div>
                            <div class="auction-content">
                                <h6 class="title">
                                    <a href="product-details.html">{{ $bid->item_name }}</a>
                                </h6>
                                <div class="bid-amount">
                                    <div class="icon">
                                        <i class="flaticon-auction"></i>
                                    </div>
                                    <div class="amount-content">
                                        <div class="current">Current Bid</div>
                                        <div class="amount">{{ $bid->starting_bid }}</div>
                                    </div>
                                </div>
                                <div class="bids-area">
                                    Total Bids : <span class="total-bids">190 Bids</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
                    
                </div>
            </div>
        </div>
    </section>
    <!--============= Popular Auction Section Ends Here =============-->
               
        <!--============= Bike Auction Section Starts Here =============-->
        <section class="car-auction-section padding-bottom padding-top pos-rel oh">
            {{-- <div class="car-bg"><img src="{{ asset('images/auction/car/car-bg.png') }}" alt="car"></div> --}}
            <div class="container">
                <div class="section-header-3">
                    <div class="left">
                        <div class="thumb">
                            <img src="{{ asset('images/header-icons/car-1.png') }}" alt="header-icons">
                        </div>
                        <div class="title-area">
                            <h2 class="title">Bikes</h2>
                            <p>We offer affordable Bikes</p>
                        </div>
                    </div>
                    <a href="/bikes-all" class="normal-button">View All Bikes</a>
                </div>
                <div class="row justify-content-center mb-30-none">
                @foreach($bids as $bid)
                @if($bid->item_category == 'BIKE')
                    <div class="col-sm-10 col-md-6 col-lg-4">
                    
                        <div class="auction-item-2">
                            <div class="auction-thumb">
                                <a href="product-details.html"><img src="{{ asset('images/auction/car/auction-1.jpg') }}" alt="car"></a>
                                <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                            </div>
                            <div class="auction-content">
                                <h6 class="title">
                                    <a href="product-details.html">{{ $bid->item_name }}</a>
                                </h6>
                                <div class="bid-area">
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-auction"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Starting Bid</div>
                                            <div class="amount">KES {{ $bid->starting_bid }}</div>
                                        </div>
                                    </div>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-money"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Retail Price</div>
                                            <div class="amount">KES {{ $bid->retail_price }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="countdown-area">
                                    <div class="countdown">
                                        <div id="bid_counter26"></div>
                                    </div>
                                    <span class="total-bids">30 Bids</span>
                                </div>

                                <div>
                                <br>
                                <h6><strong>Bid Via Mpesa</strong></h6>
                                <hr>
                                <p>Send just Ksh 80 to 777892 with <strong>{{ $bid->item_keyphrase }}</strong> and your bid amount as the account number eg {{ $bid->item_keyphrase }} 310 to bid Ksh 310.</p>
                                <hr>
                                <p>Or bid online! Have your phone unlocked and ready to pay Ksh 80.</p>
                                <br>
                                </div>

                                <div class="text-center">
                                <form action="/place/bid" method="POST">
                                    @csrf
                                    <label for="bid_amount">Amount</label>
                                    <input name="bid_amount" class="form-input" type="text">
                                    <label for="phone_number">Phone Number</label>
                                    <input name="phone_number" class="form-input" type="text">
                                    <input name="bid_unique_id" value="{{ $bid->bid_unique_id }}" class="form-input" type="hidden">
                                    <br>
                                    <button type="submit" class="custom-button">Submit a bid</button>
                                </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    @endif
                    @endforeach
                    
                </div>
            </div>
        </section>
        <!--============= Car Auction Section Ends Here =============-->
    </div>


    <!--============= Jewelry Auction Section Starts Here =============-->
    <section class="jewelry-auction-section padding-bottom padding-top pos-rel">
        {{-- <div class="jewelry-bg d-none d-xl-block"><img src="{{ asset('images/auction/jewelry/jwelry-bg.png') }}" alt="jewelry"></div> --}}
        <div class="container">
            <div class="section-header-3">
                <div class="left">
                    <div class="thumb">
                        <img src="{{ asset('images/header-icons/coin-1.png') }}" alt="header-icons">
                    </div>
                    <div class="title-area">
                        <h2 class="title">Phones</h2>
                        <p>Online jewelry auctions where you can bid now and save money</p>
                    </div>
                </div>
                <a href="/phones-all" class="normal-button">View All Phones</a>
            </div>
            <div class="row justify-content-center mb-30-none">
            @foreach($bids as $bid)
            @if($bid->item_category == 'PHONE')
                    <div class="col-sm-10 col-md-6 col-lg-4">
                    
                        <div class="auction-item-2">
                            <div class="auction-thumb">
                                <a href="product-details.html"><img src="{{ asset('images/auction/jewelry/auction-2.jpg') }}" alt="car"></a>
                                <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                            </div>
                            <div class="auction-content">
                                <h6 class="title">
                                    <a href="product-details.html">{{ $bid->item_name }}</a>
                                </h6>
                                <div class="bid-area">
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-auction"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Starting Bid</div>
                                            <div class="amount">KES {{ $bid->starting_bid }}</div>
                                        </div>
                                    </div>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-money"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Retail Price</div>
                                            <div class="amount">KES {{ $bid->retail_price }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="countdown-area">
                                    <div class="countdown">
                                        <div id="bid_counter26"></div>
                                    </div>
                                    <span class="total-bids">30 Bids</span>
                                </div>

                                <div>
                                <br>
                                <h6><strong>Bid Via Mpesa</strong></h6>
                                <hr>
                                <p>Send just Ksh 80 to 777892 with <strong>{{ $bid->item_keyphrase }}</strong> and your bid amount as the account number eg {{ $bid->item_keyphrase }} 310 to bid Ksh 310.</p>
                                <hr>
                                <p>Or bid online! Have your phone unlocked and ready to pay Ksh 80.</p>
                                <br>
                                </div>

                                <div class="text-center">
                                <form action="/place/bid" method="POST">
                                    @csrf
                                    <label for="bid_amount">Amount</label>
                                    <input name="bid_amount" class="form-input" type="text">
                                    <label for="phone_number">Phone Number</label>
                                    <input name="phone_number" class="form-input" type="text">
                                    <br>
                                    <button type="submit" class="custom-button">Submit a bid</button>
                                </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    @endif
                    @endforeach                
            </div>
        </div>
    </section>
    <!--============= Phones Auction Section Ends Here =============-->    


    <!--============= Vouchers Auction Section Starts Here =============-->
    <section class="jewelry-auction-section padding-bottom padding-top pos-rel">
        {{-- <div class="jewelry-bg d-none d-xl-block"><img src="{{ asset('images/auction/jewelry/jwelry-bg.png') }}" alt="jewelry"></div> --}}
        <div class="container">
            <div class="section-header-3">
                <div class="left">
                    <div class="thumb">
                        <img src="{{ asset('images/header-icons/coin-1.png') }}" alt="header-icons">
                    </div>
                    <div class="title-area">
                        <h2 class="title">Vouchers</h2>
                        <p>Online voucher auctions where you can bid now and save money</p>
                    </div>
                </div>
                <a href="/phones-all" class="normal-button">View All Phones</a>
            </div>
            <div class="row justify-content-center mb-30-none">
            @foreach($bids as $bid)
            @if($bid->item_category == 'PHONE')
                    <div class="col-sm-10 col-md-6 col-lg-4">
                    
                        <div class="auction-item-2">
                            <div class="auction-thumb">
                                <a href="product-details.html"><img src="{{ asset('images/auction/jewelry/auction-2.jpg') }}" alt="car"></a>
                                <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                            </div>
                            <div class="auction-content">
                                <h6 class="title">
                                    <a href="product-details.html">{{ $bid->item_name }}</a>
                                </h6>
                                <div class="bid-area">
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-auction"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Starting Bid</div>
                                            <div class="amount">KES {{ $bid->starting_bid }}</div>
                                        </div>
                                    </div>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-money"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Retail Price</div>
                                            <div class="amount">KES {{ $bid->retail_price }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="countdown-area">
                                    <div class="countdown">
                                        <div id="bid_counter26"></div>
                                    </div>
                                    <span class="total-bids">30 Bids</span>
                                </div>

                                <div>
                                <br>
                                <h6><strong>Bid Via Mpesa</strong></h6>
                                <hr>
                                <p>Send just Ksh 80 to 777892 with <strong>{{ $bid->item_keyphrase }}</strong> and your bid amount as the account number eg {{ $bid->item_keyphrase }} 310 to bid Ksh 310.</p>
                                <hr>
                                <p>Or bid online! Have your phone unlocked and ready to pay Ksh 80.</p>
                                <br>
                                </div>

                                <div class="text-center">
                                <form action="/place/bid" method="POST">
                                    @csrf
                                    <label for="bid_amount">Amount</label>
                                    <input name="bid_amount" class="form-input" type="text">
                                    <label for="phone_number">Phone Number</label>
                                    <input name="phone_number" class="form-input" type="text">
                                    <br>
                                    <button type="submit" class="custom-button">Submit a bid</button>
                                </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    @endif
                    @endforeach                
            </div>
        </div>
    </section>
    <!--============= Vouchers Auction Section Ends Here =============-->


    
    
    <!--============= Client Section Starts Here =============-->
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
    </section>
    <!--============= Client Section Ends Here =============-->


    <!--============= Footer Section Starts Here =============-->
    @include('partials.footer')
    <!--============= Footer Section Ends Here =============-->

</body>
<!-- Mirrored from www.pixner.net/BidLeo/main// by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Apr 2021 09:09:46 GMT -->
</html>
