@include('partials.header')


<!--============= Hero Section Starts Here =============-->
<div class="hero-section style-2 pb-lg-400">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a href="#0">My Account</a>
                </li>
                <li>
                    <span>Dashboard</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center" data-background="{{ asset('images/banner/hero-bg.png') }}"></div>
    </div>
    <!--============= Hero Section Ends Here =============-->


    <!--============= Dashboard Section Starts Here =============-->
    <section class="dashboard-section padding-bottom mt--240 mt-lg--325 pos-rel">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-7 col-lg-4">
                    <div class="dashboard-widget mb-30 mb-lg-0">
                        <div class="user">
                            
                            <div class="content">
                                <h5 class="title"><a href="#0">{{ Auth::user()->phone_number }}</a></h5>
                                <span class="username">{{ Auth::user()->name }}</span>
                            </div>
                        </div>
                        <ul class="dashboard-menu">
                        <li>
                                <!-- <button id="show-landing" class="btn">                                 -->
                                <a href="/dashboard" ><i class="flaticon-dashboard"></i>Dashboard</a>
                                <!-- </button> -->
                            </li>
                            
                            <li>
                                <!-- <button id="show-profile" class="btn"> -->
                                <a href="/dashboard-profile"><i class="flaticon-settings"></i>Personal Profile </a>
                                <!-- </button> -->
                            </li>
                            <li>
                                <!-- <button id="show-my-bid" class="btn"> -->
                                <a href="/dashboard-my-bid" class="active"><i class="flaticon-auction"></i>My Bids</a>
                                <!-- </button> -->
                            </li>
                           
                            <li>
                                <!-- <button id="show-alerts" class="btn"> -->
                                <a href="/dashboard-alerts"><i class="flaticon-alarm"></i>My Alerts</a>
                                <!-- </button> -->
                            </li>

                            <li>
                                <!-- <button id="show-alerts" class="btn"> -->
                                <a href="/wallet" ><i class="flaticon-money"></i>My Wallet</a>
                                <!-- </button> -->
                            </li>
                                
                            <li>
                                <!-- <button id="show-favorites" class="btn"> -->
                                
                                <!-- </button> -->
                            </li>
                           
                        </ul>
                    </div>
                </div>

                
<!-- =========================== -->
<!-- My Bids -->
<!-- =========================== -->
<div class="col-lg-8" id="my-bids" class="s2">
                    <div class="dash-bid-item dashboard-widget mb-40-60">
                        <div class="header">
                            <h4 class="title">My Bids</h4>
                            <span class="notify"><i class="flaticon-alarm"></i> Manage Notifications</span>
                        </div>
                        <ul class="button-area nav nav-tabs">
                            <li>
                                <a href="#upcoming" data-toggle="tab" class="custom-button active">Upcoming</a>
                            </li>
                            <li>
                                <a href="#past" data-toggle="tab" class="custom-button">Past</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="upcoming">
                            <div class="row mb-30-none justify-content-center">

                                @foreach($upcoming as $item)
                                @if($item->bid_status == 'active')
                                <div class="col-sm-10 col-md-6">
                                    <div class="auction-item-2">
                                        <div class="auction-thumb">
                                            @if($item->item_category == 'PHONE')
                                            <form action="/item-details" method="POST">
                                                @csrf
                                                <input type="hidden" name="item_unique_id" value="{{ $item->item_unique_id }}">
                                            <button style="border: none; background:none; padding:0; margin:0;" type="submit"><img src="{{ asset('images/auction/phone.jpeg') }}" alt="popular"></button>
                                            </form>
                                            @endif

                                            @if($item->item_category == 'BIKE')
                                            <form action="/item-details" method="POST">
                                                @csrf
                                                <input type="hidden" name="item_unique_id" value="{{ $item->item_unique_id }}">
                                            <button style="border: none; background:none; padding:0; margin:0;" type="submit"><img src="{{ asset('images/auction/bike.jpeg') }}" alt="popular"></button>
                                            </form>
                                            @endif

                                            @if($item->item_category == 'VOUCHER')
                                            <form action="/item-details" method="POST">
                                                @csrf
                                                <input type="hidden" name="item_unique_id" value="{{ $item->item_unique_id }}">
                                            <button style="border: none; background:none; padding:0; margin:0;" type="submit"><img src="{{ asset('images/auction/voucher.jpg') }}" alt="popular"></button>
                                            </form>
                                            @endif                                
                                            <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                            <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                                        </div>
                                        <div class="auction-content">
                                            <h6 class="title">
                                                <a href="#0">{{ $item->item_name }}</a>
                                            </h6>
                                            <div class="bid-area">
                                                <div class="bid-amount">
                                                    <div class="icon">
                                                        <i class="flaticon-auction"></i>
                                                    </div>
                                                    <div class="amount-content">
                                                        <div class="current">Current Bid</div>
                                                        <div class="amount">KES {{ $item->bid_amount }}</div>
                                                    </div>
                                                </div>
                                                {{-- <div class="bid-amount">
                                                    <div class="icon">
                                                        <i class="flaticon-money"></i>
                                                    </div>
                                                    <div class="amount-content">
                                                        <div class="current">Buy Now</div>
                                                        <div class="amount">$5,00.00</div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <div class="countdown-area">
                                                <div class="countdown">
                                                    <div id="bid_counter26"></div>
                                                </div>
                                                <span class="total-bids">30 Bids</span>
                                            </div>
                                            <div class="text-center">
                                                <a href="#0" class="custom-button">Submit a bid</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="past">
                            <div class="row justify-content-center mb-30-none">

                                @foreach($past as $item)
                                @if($item->bid_status != 'active')
                                <div class="col-sm-10 col-md-6">
                                    <div class="auction-item-2">
                                        <div class="auction-thumb">
                                            @if($item->item_category == 'PHONE')
                                            <form action="/item-details" method="POST">
                                                @csrf
                                                <input type="hidden" name="item_unique_id" value="{{ $item->item_unique_id }}">
                                            <button style="border: none; background:none; padding:0; margin:0;" type="submit"><img src="{{ asset('images/auction/phone.jpeg') }}" alt="popular"></button>
                                            </form>
                                            @endif

                                            @if($item->item_category == 'BIKE')
                                            <form action="/item-details" method="POST">
                                                @csrf
                                                <input type="hidden" name="item_unique_id" value="{{ $item->item_unique_id }}">
                                            <button style="border: none; background:none; padding:0; margin:0;" type="submit"><img src="{{ asset('images/auction/bike.jpeg') }}" alt="popular"></button>
                                            </form>
                                            @endif

                                            @if($item->item_category == 'VOUCHER')
                                            <form action="/item-details" method="POST">
                                                @csrf
                                                <input type="hidden" name="item_unique_id" value="{{ $item->item_unique_id }}">
                                            <button style="border: none; background:none; padding:0; margin:0;" type="submit"><img src="{{ asset('images/auction/voucher.jpg') }}" alt="popular"></button>
                                            </form>
                                            @endif                                
                                            <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                            <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                                        </div>
                                        <div class="auction-content">
                                            <h6 class="title">
                                                <a href="#0">{{ $item->item_name }}</a>
                                            </h6>
                                            <div class="bid-area">
                                                <div class="bid-amount">
                                                    <div class="icon">
                                                        <i class="flaticon-auction"></i>
                                                    </div>
                                                    <div class="amount-content">
                                                        <div class="current">Current Bid</div>
                                                        <div class="amount">KES {{ $item->bid_amount }}</div>
                                                    </div>
                                                </div>
                                                {{-- <div class="bid-amount">
                                                    <div class="icon">
                                                        <i class="flaticon-money"></i>
                                                    </div>
                                                    <div class="amount-content">
                                                        <div class="current">Buy Now</div>
                                                        <div class="amount">$5,00.00</div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <div class="countdown-area">
                                                <div class="countdown">
                                                    <div id="bid_counter26"></div>
                                                </div>
                                                <span class="total-bids">30 Bids</span>
                                            </div>
                                            <div class="text-center">
                                                <a href="#0" class="custom-button">Submit a bid</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                              
                               
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!--============= Dashboard Section Ends Here =============-->


@include('partials.footer')
</body>
<!-- Mirrored from www.pixner.net/BidLeo/main// by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Apr 2021 09:09:46 GMT -->
</html>