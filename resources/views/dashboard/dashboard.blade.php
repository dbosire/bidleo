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
                @include('partials.dashboard.sidenav')
                

                <!-- =========================== -->
<!-- Landing right column -->   
<!-- =========================== -->             
<div class="col-lg-8" id="landing-right" class="s1">
                    <div class="dashboard-widget mb-40">
                        <div class="dashboard-title mb-30">
                            <h5 class="title">My Activity</h5>
                        </div>
                        <div class="row justify-content-center mb-30-none">
                            <div class="col-md-4 col-sm-6">
                                <div class="dashboard-item">
                                    <div class="thumb">
                                        <img src="{{ asset('images/dashboard/01.png') }}" alt="dashboard">
                                    </div>
                                    <div class="content">
                                        <h2 class="title"><span class="counter">{{ $active_bids }}</span></h2>
                                        <h6 class="info">Active Bids</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="dashboard-item">
                                    <div class="thumb">
                                        <img src="{{ asset('images/dashboard/02.png') }}" alt="dashboard">
                                    </div>
                                    <div class="content">
                                        <h2 class="title"><span class="counter">{{ $items_won }}</span></h2>
                                        <h6 class="info">Items Won</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="dashboard-item">
                                    <div class="thumb">
                                        <img src="{{ asset('images/dashboard/03.png') }}" alt="dashboard">
                                    </div>
                                    <div class="content">
                                        <h2 class="title"><span class="counter">{{ $alltime_bids }}</span></h2>
                                        <h6 class="info">All Time Bids</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-widget">
                        <h5 class="title mb-10">Purchasing</h5>
                        <div class="dashboard-purchasing-tabs">
                            <ul class="nav-tabs nav">
                                <li>
                                    <a href="#current" class="active" data-toggle="tab">Active</a>
                                </li>
                                <li>
                                    <a href="#pending" data-toggle="tab">Won</a>
                                </li>
                                <li>
                                    <a href="#history" data-toggle="tab">History</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane show active fade" id="current">
                                    <table class="purchasing-table">
                                        <thead>
                                            <th>#</th>
                                            <th>Item Name</th>
                                            <th>Item Category</th>
                                            <th>Auction ID</th>
                                            <th>Bid Amount</th>
                                        </thead>
                                        <tbody>
                                            @foreach($active as $item)
                                            @if($item->bid_status == 'active')
                                            <tr>
                                                <td data-purchase="#">{{ $loop->iteration }}</td>
                                                <td data-purchase="item name">{{ $item->item_name }}</td>
                                                <td data-purchase="item category">{{ $item->item_category }}</td>
                                                <td data-purchase="auction id">{{ $item->auction_id }}</td>
                                                <td data-purchase="bid amount">{{ $item->bid_amount }}</td>
                                            </tr>          
                                            @endif                                  
                                            @endforeach
                                        </tbody>
                                        <div class="d-flex justify-content-center">
                                            {{ $active->links() }}
                                        </div>
                                    </table>
                                </div>
                                <div class="tab-pane show fade" id="pending">
                                    <table class="purchasing-table">
                                        <thead>
                                            <th>#</th>
                                            <th>Item Name</th>
                                            <th>Item Category</th>
                                            <th>Auction ID</th>
                                            <th>Bid Amount</th>
                                        </thead>
                                        <tbody>
                                            @foreach($won as $item)
                                            @if($item->bid_status == 'won')
                                            <tr>
                                                <td data-purchase="#">{{ $loop->iteration }}</td>
                                                <td data-purchase="item name">{{ $item->item_name }}</td>
                                                <td data-purchase="item category">{{ $item->item_category }}</td>
                                                <td data-purchase="auction id">{{ $item->auction_id }}</td>
                                                <td data-purchase="bid amount">{{ $item->bid_amount }}</td>
                                            </tr>     
                                            @endif                                       
                                            @endforeach
                                        </tbody>
                                        <div class="d-flex justify-content-center">
                                            {{ $won->links() }}
                                        </div>
                                    </table>
                                </div>
                                <div class="tab-pane show fade" id="history">
                                    <table class="purchasing-table">
                                        <thead>
                                            <th>#</th>
                                            <th>Item Name</th>
                                            <th>Item Category</th>
                                            <th>Auction ID</th>
                                            <th>Bid Amount</th>
                                        </thead>
                                        <tbody>
                                            @foreach($history as $item)
                                            <tr>
                                                <td data-purchase="#">{{ $loop->iteration }}</td>
                                                <td data-purchase="item name">{{ $item->item_name }}</td>
                                                <td data-purchase="item category">{{ $item->item_category }}</td>
                                                <td data-purchase="auction id">{{ $item->auction_id }}</td>
                                                <td data-purchase="bid amount">{{ $item->bid_amount }}</td>
                                            </tr>                                            
                                            @endforeach
                                        </tbody>
                                        <div class="d-flex justify-content-center">
                                            {{ $history->links() }}
                                        </div>
                                    </table>
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