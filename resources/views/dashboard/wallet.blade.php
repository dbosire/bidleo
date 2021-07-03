@include('partials.header')
@include('partials.wallet-styles')

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
                            <span class="username">{{ Auth::user()->name }}</span>
                            <h5 class="title"><a href="#0">{{ Auth::user()->phone_number }}</a></h5>                            
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
                            <a href="/dashboard-profile" ><i class="flaticon-settings"></i>Personal Profile </a>
                            <!-- </button> -->
                        </li>
                        <li>
                            <!-- <button id="show-my-bid" class="btn"> -->
                            <a href="/dashboard-my-bid"><i class="flaticon-auction"></i>My Bids</a>
                            <!-- </button> -->
                        </li>
                       
                        <li>
                            <!-- <button id="show-alerts" class="btn"> -->
                            <a href="/dashboard-alerts"><i class="flaticon-alarm"></i>My Alerts</a>
                            <!-- </button> -->
                        </li>

                        <li>
                            <!-- <button id="show-alerts" class="btn"> -->
                            <a href="/wallet" class="active"><i class="flaticon-money"></i>My Wallet</a>
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
<!-- My Alerts -->
<!-- =========================== --> 
<div class="col-lg-8" class="s2">
    <div class="container">
        <div class="mobile" style="max-width: 100%">
            <div class="header">
                {{-- <div class="navigation">
                    <i class="fas fa-arrow-left"></i>
                </div>
                <div class="filter">
                    <div class="calendar">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <div class="option">2017</div>
                    <div class="select">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </div> --}}
            </div>
            <div class="content2">
                <div class="total">
                    <div class="label">Total balance</div>
                    <div class="value">KES,3000</div>
                    {{-- <div class="balance">+ $3968,00</div> --}}
                </div>
                {{-- <div class="cards">
                    <div class="card green">
                        <div class="item">
                            <div class="label">Revenues</div>
                            <div class="value">$890.30</div>
                        </div>
                        <div class="balance">
                            <div class="arrow-up">
                                <i class="fas fa-arrow-up"></i>
                            </div>
                            <div class="value">0.30%</div>
                        </div>
                    </div>
                    <div class="card magenta">
                        <div class="item">
                            <div class="label">Revenues</div>
                            <div class="value">$890.30</div>
                        </div>
                        <div class="balance">
                            <div class="arrow-up">
                                <i class="fas fa-arrow-up"></i>
                            </div>
                            <div class="value">0.30%</div>
                        </div>
                    </div>
                    <div class="card gray">
                        <div class="item">
                            <div class="label">Saving</div>
                            <div class="value">$138.10</div>
                        </div>
                        <div class="balance">
                            <div class="arrow-up">
                                <i class="fas fa-arrow-up"></i>
                            </div>
                            <div class="value">2.58%</div>
                        </div>
                    </div>
                </div> --}}
                {{-- <ul class="menu">
                    <li>
                        <input type="radio" id="tab1" name="amount" checked="checked" />
                        <label for="tab1">
                            <i class="fas fa-arrow-up"></i>
                            Activities</label>

                    </li>
                    <li>
                        <input type="radio" id="tab2" name="amount" />
                        <label for="tab2">
                            <i class="fas fa-arrow-up"></i>
                            Statistics</label>

                    </li>
                    <li>
                        <input type="radio" id="tab3" name="amount" />
                        <label for="tab3">
                            <i class="fas fa-arrow-up"></i>
                            Summary</label>

                    </li>
                </ul> --}}
                <div class="list">
                    <div class="item1">
                        <div class="section1">
                            <div class="icon down">
                                <i class="fas fa-arrow-up"></i>
                            </div>
                            <div class="text">
                                <div class="title">Invalid Bid Amount</div>
                                <div class="description">Today, 13:45</div>
                            </div>
                        </div>
                        <div class="section2">
                            <div class="signal negative">-</div>
                            <div class="value">KES 105.3</div>
                        </div>
                    </div>
                    <div class="item2">
                        <div class="section1">
                            <div class="icon up">
                                <i class="fas fa-arrow-up"></i>
                            </div>
                            <div class="text">
                                <div class="title">Self Deposit ING BANK</div>
                                <div class="description">Today, 13:45</div>
                            </div>
                        </div>
                        <div class="section2">
                            <div class="signal positive">+</div>
                            <div class="value">KES 260</div>
                        </div>
                    </div>
                    <div class="item3">
                        <div class="section1">
                            <div class="icon down">
                                <i class="fas fa-arrow-up"></i>
                            </div>
                            <div class="text">
                                <div class="title">Paypal Transfer</div>
                                <div class="description">July 23, 2016</div>
                            </div>
                        </div>
                        <div class="section2">
                            <div class="signal negative">-</div>
                            <div class="value">KES 840</div>
                        </div>
                    </div>
                    <div class="item4">
                        <div class="section1">
                            <div class="icon up">
                                <i class="fas fa-arrow-up"></i>
                            </div>
                            <div class="text">
                                <div class="title">Self Deposit ING BANK</div>
                                <div class="description">Today, 13:45</div>
                            </div>
                        </div>
                        <div class="section2">
                            <div class="signal positive">+</div>
                            <div class="value">KES 260</div>
                        </div>
                    </div>
                </div>
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