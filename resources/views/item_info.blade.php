@include('partials.header')

 <!--============= Hero Section Starts Here =============-->
 <div class="hero-section style-2">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a href="#0">Pages</a>
                </li>
                <li>
                    <span>{{ $item->item_name }}</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center"></div>
    </div>
    <!--============= Hero Section Ends Here =============-->


    <!--============= Product Details Section Starts Here =============-->
    <section class="product-details pt-1 mt-1 padding-bottom mt--240 mt-lg--440">
        <div class="container">
            {{-- <div class="product-details-slider-top-wrapper">
                <div class="product-details-slider owl-theme owl-carousel" id="sync1">
                    <div class="slide-top-item">
                        <div class="slide-inner">
                            <img src="{{ asset('images/product/product1.png') }}" alt="product">
                        </div>
                    </div>
                    <div class="slide-top-item">
                        <div class="slide-inner">
                            <img src="{{ asset('images/product/product2.png') }}" alt="product">
                        </div>
                    </div>
                    <div class="slide-top-item">
                        <div class="slide-inner">
                            <img src="{{ asset('images/product/product3.png') }}" alt="product">
                        </div>
                    </div>
                    <div class="slide-top-item">
                        <div class="slide-inner">
                            <img src="{{ asset('images/product/product4.png') }}" alt="product">
                        </div>
                    </div>
                    <div class="slide-top-item">
                        <div class="slide-inner">
                            <img src="{{ asset('images/product/product5.png') }}" alt="product">
                        </div>
                    </div>
                    <div class="slide-top-item">
                        <div class="slide-inner">
                            <img src="{{ asset('images/product/product6.png') }}" alt="product">
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-details-slider-wrapper">
                <div class="product-bottom-slider owl-theme owl-carousel" id="sync2">
                    <div class="slide-bottom-item">
                        <div class="slide-inner">
                            <img src="{{ asset('images/product/01.png') }}" alt="product">
                        </div>
                    </div>
                    <div class="slide-bottom-item">
                        <div class="slide-inner">
                            <img src="{{ asset('images/product/02.png') }}" alt="product">
                        </div>
                    </div>
                    <div class="slide-bottom-item">
                        <div class="slide-inner">
                            <img src="{{ asset('images/product/03.png') }}" alt="product">
                        </div>
                    </div>
                    <div class="slide-bottom-item">
                        <div class="slide-inner">
                            <img src="{{ asset('images/product/04.png') }}" alt="product">
                        </div>
                    </div>
                    <div class="slide-bottom-item">
                        <div class="slide-inner">
                            <img src="{{ asset('images/product/05.png') }}" alt="product">
                        </div>
                    </div>
                    <div class="slide-bottom-item">
                        <div class="slide-inner">
                            <img src="{{ asset('images/product/06.png') }}" alt="product">
                        </div>
                    </div>
                </div>
                <span class="det-prev det-nav">
                    <i class="fas fa-angle-left"></i>
                </span>
                <span class="det-next det-nav active">
                    <i class="fas fa-angle-right"></i>
                </span>
            </div> --}}
            <div class="row mt-40-60-80">
                <div class="col-lg-8">
                    <div class="product-details-content">
                        <div class="product-details-header">
                            <h2 class="title">{{$item->full_name}}</h2>
                            <ul>
                                <li>Item Unique ID: {{ $item->item_unique_id }}</li>
                                <li>Item #: {{ $item->id }}</li>
                            </ul>
                        </div>
                        <ul class="price-table mb-30">
                            <li class="header">
                                <h5 class="current">Current Retail Price</h5>
                                <h3 class="price">{{ $item->retail_price }}</h3>
                            </li>
                            {{-- <li>
                                <span class="details">Buyer's Premium</span>
                                <h5 class="info">10.00%</h5>
                            </li>
                            <li>
                                <span class="details">Bid Increment (US)</span>
                                <h5 class="info">$50.00</h5>
                            </li> --}}
                        </ul>
                        @if (Auth::user())
                        <div class="product-bid-area">
                            <form action="/place/bid" method="POST" class="product-bid-form">
                                @csrf
                                <div class="search-icon">
                                    <img src="{{ asset('images/product/search-icon.png') }}" alt="product">
                                </div>
                                <input type="hidden" name="phone_number" value="{{Auth::user()->phone_number}}">                                
                                <input name="auction_id" value="{{ $item->auction_id }}" class="form-input" type="hidden">
                                <input name="item_name" value="{{ $item->item_name }}" class="form-input" type="hidden">
                                <input name="item_keyphrase" value="{{ $item->item_keyphrase}}" class="form-input" type="hidden">
                                <input name="item_category" value="{{ $item->item_category}}" class="form-input" type="hidden">
                                <input name="item_unique_id" value="{{ $item->item_unique_id}}" class="form-input" type="hidden">
                                <input name="bid_amount" type="text" placeholder="Enter Bid Amount">
                                <button type="submit" class="custom-button">Submit a bid</button>
                            </form>
                        </div>
                        @endif
                        
                        {{-- <div class="buy-now-area">
                            <a href="#0" class="custom-button">Buy Now: $4,200</a>
                            <a href="#0" class="rating custom-button active border"><i class="fas fa-star"></i> Add to Wishlist</a>
                            <div class="share-area">
                                <span>Share to:</span>
                                <ul>
                                    <li>
                                        <a href="#0"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#0"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#0"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    <li>
                                        <a href="#0"><i class="fab fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="product-sidebar-area">
                        <div class="product-single-sidebar my-auto mb-3">
                            <h6 class="title">This Auction Ends in:</h6>
                            <div class="countdown">                                
                                <div id="timer-3" data-countdown="{{ $item->bid_end_date }}"></div>
                            </div>
                            <div class="side-counter-area">
                                <div class="side-counter-item">
                                    <div class="thumb">
                                        <img src="{{ asset('images/product/icon1.png') }}" alt="product">
                                    </div>
                                    <div class="content">
                                        <h3 class="count-title"><span class="counter">61</span></h3>
                                        <p>Active Bidders</p>
                                    </div>
                                </div>
                                <div class="side-counter-item">
                                    <div class="thumb">
                                        <img src="{{ asset('images/product/icon2.png') }}" alt="product">
                                    </div>
                                    <div class="content">
                                        <h3 class="count-title"><span class="counter">203</span></h3>
                                        <p>Watching</p>
                                    </div>
                                </div>
                                <div class="side-counter-item">
                                    <div class="thumb">
                                        <img src="{{ asset('images/product/icon3.png') }}" alt="product">
                                    </div>
                                    <div class="content">
                                        <h3 class="count-title"><span class="counter">82</span></h3>
                                        <p>Total Bids</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="/terms" class="cart-link">View Our Terms & Conditions</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-tab-menu-area mb-40-60 mt-70-100">
            <div class="container">
                <ul class="product-tab-menu nav nav-tabs">
                    <li>
                        <a href="#details" class="active" data-toggle="tab">
                            <div class="thumb">
                                <img src="{{ asset('images/product/tab1.png') }}" alt="product">
                            </div>
                            <div class="content">Description</div>
                        </a>
                    </li>
                    <li>
                        <a href="#delevery" data-toggle="tab">
                            <div class="thumb">
                                <img src="{{ asset('images/product/tab2.png') }}" alt="product">
                            </div>
                            <div class="content">Delivery Options</div>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="#history" data-toggle="tab">
                            <div class="thumb">
                                <img src="{{ asset('images/product/tab3.png') }}" alt="product">
                            </div>
                            <div class="content">Bid History (36)</div>
                        </a>
                    </li> --}}
                    <li>
                        <a href="#questions" data-toggle="tab">
                            <div class="thumb">
                                <img src="{{ asset('images/product/tab4.png') }}" alt="product">
                            </div>
                            <div class="content">Questions </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="tab-content">


                <div class="tab-pane fade show active" id="details">
                    <div class="tab-details-content">
                        <div class="header-area">
                            <h3 class="title">{{$item->full_name}}</h3>

                            <div class="item">
                                <table class="product-info-table">

                                    @if ($item->item_category == 'BIKE')
                                    <tbody>
                                        <tr>
                                            <th>Condition</th>
                                            <td>{{$item->condition}}</td>
                                        </tr>
                                        <tr>
                                            <th>Mileage</th>
                                            <td>{{$item->mileage}}</td>
                                        </tr>
                                        <tr>
                                            <th>Year</th>
                                            <td>{{$item->year}}</td>
                                        </tr>
                                        <tr>
                                            <th>Engine</th>
                                            <td>{{$item->engine}}</td>
                                        </tr>
                                        <tr>
                                            <th>Fuel</th>
                                            <td>{{$item->fuel}}</td>
                                        </tr>
                                        <tr>
                                            <th>Transmission</th>
                                            <td>{{$item->transmission}}</td>
                                        </tr>
                                        <tr>
                                            <th>Color</th>
                                            <td>{{$item->color}}</td>
                                        </tr>                                        
                                    </tbody>
                                    @endif

                                    @if ($item->item_category == 'PHONE')
                                    <tbody>
                                        <tr>
                                            <th>Condition</th>
                                            <td>{{$item->condition}}</td>
                                        </tr>                                       
                                        <tr>
                                            <th>Year</th>
                                            <td>{{$item->year}}</td>
                                        </tr>                                        
                                        <tr>
                                            <th>Color</th>
                                            <td>{{$item->color}}</td>
                                        </tr>   
                                        <tr>
                                            <th>Dual Sim</th>
                                            <td>{{$item->dual_sim}}</td>
                                        </tr>  
                                        <tr>
                                            <th>Storage</th>
                                            <td>{{$item->storage}}</td>
                                        </tr>    
                                        <tr>
                                            <th>Front Camera</th>
                                            <td>{{$item->front_camera}}</td>
                                        </tr>       
                                        <tr>
                                            <th>Back Camera</th>
                                            <td>{{$item->back_camera}}</td>
                                        </tr>                              
                                    </tbody>
                                    @endif

                                    @if ($item->item_category == 'VOUCHER')
                                    <tbody>
                                        <tr>
                                            <th>Amount</th>
                                            <td>{{$item->voucher_amount}}</td>
                                        </tr>                                       
                                        <tr>
                                            <th>Usable At</th>
                                            <td>{{$item->usable_at}}</td>
                                        </tr>                                        
                                        <tr>
                                            <th>Expiration Date</th>
                                            <td>{{$item->expiration_date}}</td>
                                        </tr>                                                                      
                                    </tbody>
                                    @endif
                                    


                                </table>
                            </div>
                            
                            
                            <div class="item">
                                <h5 class="subtitle">Acceptance of condition - buyer inspection/preview</h5>
                                <p>Vehicles and equipment often display significant wear and tear. Assets are sold AS IS with no warranty, express or implied, and we highly recommend previewing them before bidding. The preview period is the only opportunity to inspect an asset to verify condition and suitability. No refunds, adjustments or returns will be entertained. </p>
                                <p>Vehicle preview inspections of the vehicle can be done at the below location on Monday and Tuesday from 10am - 2pm. See Preview Rules Here.</p>                                
                                <ul>
                                    <li>Kenben Industries Ltd.</li>
                                    <li>1908 Shore Parkway</li>
                                    <li>Brooklyn, NY 11214</li>
                                </ul>
                                <p>BUYER is responsible for all storage fees at time of pick-up. See above under IMPORTANT PICK-UP TIMES for specific requirements for this asset, but generally assets must be picked up within 2 business days of payment otherwise additional storage fees will be applied.</p>
                            </div>
                            <div class="item">
                                <h5 class="subtitle">Legal Notice</h5>
                                <p>Vehicles may not be driven off the lot except with a dealer plate affixed. By law, vehicles are not permitted to be parked on or to drive on the streets of New York without registration and plates registered to the vehicle. If the buyer cannot obtain the required registration and plates prior to pick up, they should have the vehicle towed at their own expense. The buyer should have the vehicle towed at their own expense.</p>
                                <p>Condition: Untested - Sold As-Is</p>
                                <p>Employees of Sbidu, its subcontractors and affiliated companies, employees of the NYC Government and those bidding on behalf of PropertyRoom.com, its subcontractors and affiliated companies and employees of the NYC Government are not permitted to bid on or purchase NYC Fleet/DCAS assets. </p>
                            </div>
                            
                            <div class="item">
                                <h5 class="subtitle">Bidding</h5>
                                <p>At this time Sbidu only accepts bidders from the United States, Canada and Mexico on Vehicles and Heavy Industrial Equipment. The Bid Now button will appear on auctions where you are qualified to place a bid.</p>
                            </div>
                            <div class="item">
                                <h5 class="subtitle">Buyer Responsibility</h5>
                                <p>The BUYER will receive an email notification from PropertyRoom.com following the close of an auction. After fraud verification and payment settlement, we will email the BUYER instructions for retrieving the ASSET from the Will-Call Location listed above.</p>
                                <p>All applicable shipping, logistics, transportation, customs, fees, taxes, export/import activities and all associated costs are the sole responsibility of the BUYER. No shipping, customs, export or import assistance is available from Sbidu.</p>
                                <p>When applicable for a given ASSET, BUYER bears responsibility for determining motor vehicle registration requirements in the applicable jurisdiction as well as costs, including any fees, registration fees, taxes, etc., owed as a result of BUYER registering an ASSET; for example, BUYER bears sole responsibility for all title/registration/smog and other such fees.</p>
                                <p>BUYER is responsible for all storage fees at time of pick-up. See above under IMPORTANT PICK-UP TIMES for specific requirements for this asset, but generally assets must be picked up within 2 business days of payment otherwise additional storage fees will be applied.</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab-pane fade show" id="delevery">
                    <div class="shipping-wrapper">
                        <div class="item">
                            <h5 class="title">shipping</h5>
                            <div class="table-wrapper">
                                <table class="shipping-table">
                                    <thead>
                                        <tr>
                                            <th>Available delivery methods </th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Customer Pick-up (within 10 days)</td>
                                            <td>$0.00</td>
                                        </tr>
                                        <tr>
                                            <td>Standard Shipping (5-7 business days)</td>
                                            <td>Not Applicable</td>
                                        </tr>
                                        <tr>
                                            <td>Expedited Shipping (2-4 business days)</td>
                                            <td>Not Applicable</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="item">
                            <h5 class="title">Notes</h5>
                            <p>Please carefully review our shipping and returns policy before committing to a bid.
                            From time to time, and at its sole discretion, Sbidu may change the prevailing fee structure for shipping and handling.</p>
                        </div>
                    </div>
                </div>
                {{-- <div class="tab-pane fade show" id="history">
                    <div class="history-wrapper">
                        <div class="item">
                            <h5 class="title">Bid History</h5>
                            <div class="history-table-area">
                                <table class="history-table">
                                    <thead>
                                        <tr>
                                            <th>Bidder</th>
                                            <th>date</th>
                                            <th>time</th>
                                            <th>unit price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-history="bidder">
                                                <div class="user-info">
                                                    <div class="thumb">
                                                        <img src="{{ asset('images/history/01.png') }}" alt="history">
                                                    </div>
                                                    <div class="content">
                                                        Moses Watts
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-history="date">06/16/2021</td>
                                            <td data-history="time">02:45:25 PM</td>
                                            <td data-history="unit price">$900.00</td>
                                        </tr>
                                        <tr>
                                            <td data-history="bidder">
                                                <div class="user-info">
                                                    <div class="thumb">
                                                        <img src="{{ asset('images/history/02.png') }}" alt="history">
                                                    </div>
                                                    <div class="content">
                                                        Pat Powell
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-history="date">06/16/2021</td>
                                            <td data-history="time">02:45:25 PM</td>
                                            <td data-history="unit price">$900.00</td>
                                        </tr>
                                        <tr>
                                            <td data-history="bidder">
                                                <div class="user-info">
                                                    <div class="thumb">
                                                        <img src="{{ asset('images/history/03.png') }}" alt="history">
                                                    </div>
                                                    <div class="content">
                                                        Jack Rodgers
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-history="date">06/16/2021</td>
                                            <td data-history="time">02:45:25 PM</td>
                                            <td data-history="unit price">$900.00</td>
                                        </tr>
                                        <tr>
                                            <td data-history="bidder">
                                                <div class="user-info">
                                                    <div class="thumb">
                                                        <img src="{{ asset('images/history/04.png') }}" alt="history">
                                                    </div>
                                                    <div class="content">
                                                        Arlene Paul
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-history="date">06/16/2021</td>
                                            <td data-history="time">02:45:25 PM</td>
                                            <td data-history="unit price">$900.00</td>
                                        </tr>
                                        <tr>
                                            <td data-history="bidder">
                                                <div class="user-info">
                                                    <div class="thumb">
                                                        <img src="{{ asset('images/history/05.png') }}" alt="history">
                                                    </div>
                                                    <div class="content">
                                                        Marcia Clarke
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-history="date">06/16/2021</td>
                                            <td data-history="time">02:45:25 PM</td>
                                            <td data-history="unit price">$900.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="text-center mb-3 mt-4">
                                    <a href="#0" class="button-3">Load More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="tab-pane fade show" id="questions">
                        <h5 class="faq-head-title">Frequently Asked Questions</h5>
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
                </div>
            </div>
        </div>
    </section>
    <!--============= Product Details Section Ends Here =============-->

@include('partials.footer')
</body>
<!-- Mirrored from www.pixner.net/BidLeo/main// by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Apr 2021 09:09:46 GMT -->
</html>