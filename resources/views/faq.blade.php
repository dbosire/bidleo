@include('partials.header')

<!--============= Hero Section Starts Here =============-->
<div class="hero-section ">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="#0">Pages</a>
                </li>
                <li>
                    <span>Faqs</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center"></div>
    </div>
    <!--============= Hero Section Ends Here =============-->


    <!--============= Faq Section Starts Here =============-->
    <section class="faq-section mt-1 pt-1 padding-bottom mt--240 mt-lg--440 pos-rel">
        <div class="container">
            <div class="section-header  cl-white mw-100 left-style">
                <h2 class="title">FAQ</h2>
                <p>Do not hesitate to send us an email if you can't find what you're looking for.</p>
            </div>
            <div class="row mb--50">
                <div class="col-lg-12 mb-50">
                    <div class="faq-wrapper">
                        <div class="faq-item">
                            <div class="faq-title">
                                <img src="{{ asset('css/img/faq.png') }}" alt="css"><span class="title">What is a bid?</span><span class="right-icon"></span>
                            </div>
                            <div class="faq-content">
                                <p>A bid is the amount in Kenya Shillings that a Bidder has entered or intends to enter into the Auction for a specific item. </p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-title">
                                <img src="{{ asset('css/img/faq.png') }}" alt="css"><span class="title">How do I bid?</span><span class="right-icon"></span>
                            </div>
                            <div class="faq-content">
                                <p>Bidding with BIDLEO couldn’t be easier - simply send the fixed entry fee to the advertised Mpesa paybill number, typically 337575 using your Safaricom paybill function. You don’t even need a smart phone to play. Put your bid amount in the paybill account field together with the keyword (be sure to double check you are using the exact keyword advertised), enter the fixed entry fee followed by your pin; then wait for updates. For example, if you want to place of a bid of Ksh1000 and the keyword is CAR, put 1000 CAR in the account field, followed by the bid entry fee as the amount, followed by your pin. And that’s it! Bidders have the opportunity to place multiple bids of different bid amounts to maximise their likelihood of being the successful bidder. .</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-title">
                                <img src="{{ asset('css/img/faq.png') }}" alt="css"><span class="title">How will I know I am the successful bidder </span><span class="right-icon"></span>
                            </div>
                            <div class="faq-content">
                                <p>You will be notified via SMS at the close of the auction if you are the successful bidder. You will also be contacted soon after by our customer care team with instructions and information relating to delivery and to verify your identity.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-title">
                                <img src="{{ asset('css/img/faq.png') }}" alt="css"><span class="title">How do I receive my item if I am the successful bidder ?</span><span class="right-icon"></span>
                            </div>
                            <div class="faq-content">
                                <p>If you are the successful bidder, you’ll receive a confirmation text. You’ll also receive a call from us soon after. The call will be to verify details and may, at our sole discretion, arrange a shipping service nationwide to your nearest post office. In the case of larger items, you will likely be required to come to collect the item, but don’t worry, full details and assistance will be provided by our customer care team</p>
                            </div>
                        </div>
                        <div class="faq-item open active">
                            <div class="faq-title">
                                <img src="{{ asset('css/img/faq.png') }}" alt="css"><span class="title">How many times can I place my bids in a day ?</span><span class="right-icon"></span>
                            </div>
                            <div class="faq-content">
                                <p>You can bid as many times as you choose in a day. However, we do advise all our bidders to bid responsibly. </p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-title">
                                <img src="{{ asset('css/img/faq.png') }}" alt="css"><span class="title">Are there any other methods of bidding available?</span><span class="right-icon"></span>
                            </div>
                            <div class="faq-content">
                                <p>1. Bidders may participate in the usual way by entering their bids via Mpesa.
                               2.Bidders may participate by entering their bids via the Website with following process:
                               Go to bidleo.co.ke. Select the auction that you wish to bid on and follow the instructions in the fields below. Select the option to bid online. Enter your phone number and bid amount (the relevant keyword is automatically assigned when bidding online). Wait for the STK prompt on your phone and enter your Mpesa pin to complete the bidding process.
                              3.Bidders may also participate by entering their bids via SMS to 780452 using funds in their BIDLEO Wallet. The text must include the keyword and the bid amount..</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-title">
                                <img src="{{ asset('css/img/faq.png') }}" alt="css"><span class="title">I have not received a confirmation message – what do I do?</span><span class="right-icon"></span>
                            </div>
                            <div class="faq-content">
                                <p>Kindly dial 456*9*5# and follow instructions to check if you stopped our promotional messages. If yes, kindly proceed to activate the promotional messages. For further assistance kindly share with us your phone number and the date and time you placed your bid. You can also call us on +254 111 005 111 for assistance.</p>
                            </div>
                        </div>
                   
                
                 
                        <div class="faq-item">
                            <div class="faq-title">
                                <img src="{{ asset('css/img/faq.png') }}" alt="css"><span class="title">What does it mean if my bid is currently unique?</span><span class="right-icon"></span>
                            </div>
                            <div class="faq-content">
                                <p>This means that at the time of entry, no other bidder has selected to bid the same bid amount that you have selected. It does not mean that you are the successful bidder but does indicate that at the time of entry there is a possibility that you could be the lowest unique bidder at the close of the auction. If before the auction closes, another bidder enters the same bid amount, your bid will no longer be unique. </p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-title">
                                <img src="{{ asset('css/img/faq.png') }}" alt="css"><span class="title">What does it mean if my bid is not unique? </span><span class="right-icon"></span>
                            </div>
                            <div class="faq-content">
                                <p>This means that another bidder has entered the same bid amount. Please try bidding again with a different bid amount.</p>
                            </div>
                        </div>
             
                
                  
                    </div>
                </div>
                <div class="col-lg-4 mb-50">
                    <aside class="sticky-menu">
                        <div class="faq-menu bg_img mb-30" data-background="{{ asset('images/faq/faq-menu.png') }}" style="background-image: url(images/faq/faq-menu.html);">
                      <!--       <ul id="faq-menu">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#company">For Companies</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#freelancer">For Freelancers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#account">Your Account</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#pricing">Pricing Plans</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tec">Technical</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#security">Security</a>
                                </li>
                            </ul> -->
                        </div>
                        <!-- <div class="faq-video mb-30"> -->
                            <!-- <a href="https://www.youtube.com/watch?v=Mj3QejzYZ70" class="video-area popup"> -->
                                <!-- <img src="{{ asset('images/faq/video.png') }}" alt="faq"> -->
                            <!--     <div class="video-button-2">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <i class="fas fa-play"></i>
                                </div> -->
                          
                   <!--      <div class="popular-article pt-30 mb--20">
                            <h4 class="title mb-20">Most Popular Articles</h4>
                            <div class="popular-article-item">
                                <a href="#0" class="right-con"><i class="flaticon-right-arrow"></i></a>
                                <h5 class="title"><a href="#0">Tips for winning</a></h5>
                                <p>Found an item you love? Here are some tips for winning your next item:</p>
                            </div>
                            <div class="popular-article-item">
                                <a href="#0" class="right-con"><i class="flaticon-right-arrow"></i></a>
                                <h5 class="title"><a href="#0">How to bid at an Auction</a></h5>
                                <p>Bidding at auction can be terrifying,
                                    especially your first time.</p>
                            </div>
                            <div class="popular-article-item">
                                <a href="#0" class="right-con"><i class="flaticon-right-arrow"></i></a>
                                <h5 class="title"><a href="#0">Bid increments</a></h5>
                                <p>Each auction house sets their own
                                    bidding increments</p>
                            </div>
                        </div> -->
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!--============= Faq Section Ends Here =============-->


@include('partials.footer')
</body>
<!-- Mirrored from www.pixner.net/BidLeo/main// by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Apr 2021 09:09:46 GMT -->
</html>