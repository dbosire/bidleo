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
                            <a href="/create-bid"><i class="flaticon-settings"></i>Create a bid</a>
                            </li>
                            <li>
                                <!-- <button id="show-profile" class="btn"> -->
                                <a href="/dashboard-profile"><i class="flaticon-settings"></i>Personal Profile </a>
                                <!-- </button> -->
                            </li>
                            <li>
                                <!-- <button id="show-my-bid" class="btn"> -->
                                <a href="/dashboard-my-bid"><i class="flaticon-auction"></i>My Bids</a>
                                <!-- </button> -->
                            </li>
                            <li>
                                <!-- <button id="show-winnings" class="btn"> -->
                                <a href="/dashboard-winning-bids"><i class="flaticon-best-seller"></i>Winning Bids</a>
                                <!-- </button> -->
                            </li>
                            <li>
                                <!-- <button id="show-alerts" class="btn"> -->
                                <a href="/dashboard-alerts"><i class="flaticon-alarm"></i>My Alerts</a>
                                <!-- </button> -->
                            </li>
                                
                            <li>
                                <!-- <button id="show-favorites" class="btn"> -->
                                <a href="/dashboard-favorites"><i class="flaticon-star"></i>My Favorites</a>
                                <!-- </button> -->
                            </li>
                            <li>
                                <!-- <button id="show-referral" class="btn"> -->
                                <a href="/dashboard-referrals" class="active"><i class="flaticon-shake-hand"></i>Referrals</a>
                                <!-- </button> -->
                            </li>
                        </ul>
                    </div>
                </div>

                

<!-- =========================== -->
<!-- Referrals -->
<!-- =========================== --> 
<div class="col-lg-8" id="referrals" class="s2">
                    <div class="dashboard-widget mb-30">
                        <h4 class="title mt-0 mb-20">Welcome to the Sbidu Referral program.</h4>
                        <p>Have friends sign up using your unique link and earn rewards.</p>
                    </div>
                    <div class="dashboard-widget mb-30">
                        <h5 class="title mt-0 mb-20">Share your unique referral link</h5>
                        <form action="#0" class="referral-form mb-30">
                            <input type="text" value="https://Sbidu.com?grsf=y4wyd8" readonly>
                            <button type="submit" class="custom-button">Copy Link</button>
                        </form>
                        <div class="share-area">
                            <div class="left">
                                Share :
                            </div>
                            <ul class="social-icons">
                                <li>
                                    <a href="#0" class="active"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="#0"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#0"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="#0"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="dashboard-widget mb-30">
                        <h5 class="title mt-0 mb-30">Promotions & Rewards</h5>
                        <p class="mb-3 mb-md-4">Give $5 off to a friend and get $5 credit after they make a purchase</p>
                        <a href="#0" class="custom-button pink"><i class="flaticon-trophy"></i> 1 Referrals Required</a>
                    </div>
                    <div class="dashboard-widget mb-30">
                        <h5 class="title mt-0 mb-20">Leaderboard</h5>
                        <table class="referral-table">
                            <thead>
                                <tr>
                                    <th>Rank</th>
                                    <th>Sbidu Bidder</th>
                                    <th>Referrals</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-label="rank">#01</td>
                                    <td data-label="Sbidu bidder">jo*@m**********</td>
                                    <td data-label="referrals">01</td>
                                </tr>
                                <tr>
                                    <td data-label="rank">#02</td>
                                    <td data-label="Sbidu bidder">ma****************@y********</td>
                                    <td data-label="referrals">01</td>
                                </tr>
                                <tr>
                                    <td data-label="rank">#03</td>
                                    <td data-label="Sbidu bidder">ho********@y********</td>
                                    <td data-label="referrals">00</td>
                                </tr>
                                <tr>
                                    <td data-label="rank">#04</td>
                                    <td data-label="Sbidu bidder">ma****************@y********</td>
                                    <td data-label="referrals">00</td>
                                </tr>
                                <tr>
                                    <td data-label="rank">#05</td>
                                    <td data-label="Sbidu bidder">ru*@f**********</td>
                                    <td data-label="referrals">00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="dashboard-widget">
                        <h5 class="title mt-0 mb-30">Your Stats</h5>
                        <h3 class="stats">08<span>Referrals Made</span></h3>
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