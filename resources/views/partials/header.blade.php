<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<!-- Mirrored from www.pixner.net/BidLeo/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Apr 2021 09:06:58 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bidleo </title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icofont/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customercare.css') }}">   
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
</head>

<body>
    <!--============= ScrollToTop Section Starts Here =============-->
    <div class="overlayer" id="overlayer">
        <div class="loader">
            <div class="loader-inner"></div>
        </div>
    </div>
    <a href="#0" class="scrollToTop"><i class="fas fa-angle-up"></i></a>
    <div class="overlay"></div>
    <!--============= ScrollToTop Section Ends Here =============-->
    <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i> <a href="mailto:contact@example.com">info@bidleo.com</a>
        <i class="icofont-phone"></i> +254 20 266 666 4
      </div>
      <div class="social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="skype"><i class="icofont-skype"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      {{-- <h1 class="logo mr-auto"><a href="index.html">Green</a></h1> --}}
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.html" class="logo mr-auto"><img src="images/logo/logo.png" alt="" class="img-fluid"></a>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="/">Home</a></li>
          <li><a href="/hiw">How to Bid</a></li>
          {{-- <li><a href="#portfolio">Completed Auctions</a></li>   --}}                                  
          <li><a href="/faq">FAQ</a></li>
          <li><a href="/contact">Contact Us</a></li>
          <li><a href="/partner">Partner</a></li>   
          @if (Auth::user())
          <li class="drop-down"><a href="">My Profile</a>
            <ul>  
                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'customer care')
                <li>
                    <a href="/customercare-index">Customer Care Dashboard</a>    
                </li>  
                @endif 
                @if (Auth::user()->role == 'admin')
                {{-- <li>
                    <a href="#">Admin Dashboard</a>    
                </li>   --}}
                @endif                
              <li class="drop-down"><a href="/dashboard">My Portfolio</a>
                <ul>
                  <li><a href="/dashboard">My Dashboard</a></li>
                  <li><a href="/dashboard-profile">My Info</a></li>
                  <li><a href="/dashboard-my-bid">My Bids</a></li>
                  <li><a href="/dashboard-alerts">My Alerts</a></li>                 
                </ul>
              </li>             
              <li><a href="/terms">Terms & Conditions</a></li>              
            </ul>
          </li>
          @endif

        </ul>
      </nav><!-- .nav-menu -->

      @if (!Auth::user())
      <a href="/login" class="get-started-btn scrollto">Login</a>
      @else
      <a href="/logout" class="get-started-btn scrollto">Logout</a>
      @endif
      
    </div>
  </header><!-- End Header -->
    
<!--============= Header Section Starts Here =============-->
{{-- <header>
        <div class="header-top">
            <div class="container">
                <div class="header-top-wrapper">
                    <ul class="customer-support">
                        <li>
                            <a href="#0" class="mr-3"><i class="fas fa-phone-alt"></i><span class="ml-2 d-none d-sm-inline-block">254 20 266 666 4</span></a>
                        </li>
                        <li>
                            <i class="fas fa-globe"></i> 
                            <select name="language" class="select-bar">
                                <option value="en">En</option>
                                <option value="Bn">Swa</option>                                
                            </select> 
                        </li>
                    </ul>
                    <ul class="cart-button-area">
                       
                        @if (!Auth::user())
                            <li>
                            <a href="/login" class="user-button"><i class="flaticon-user"></i><span class="amount">Login</span></a>
                            </li>   
                        @else

                        @if (Auth::user())
                        @if(Auth::user()->role == 'customer_care' || Auth::user()->role == 'admin')
                        <li>
                            <a href="/customercare-index" ><i class="flaticon-dashboard"></i><span class="amount">Dashboard</span></a>
                        </li>
                        @endif
                        @endif
                        <li>
                            <a href="/dashboard"><i class="flaticon-user"></i><span class="amount">Profile for {{ Auth::user()->phone_number }}</span></a>
                        </li>
                        <li>
                            <a href="/logout" class="user-button"><i class="flaticon-exit"></i><span class="amount">Logout</span></a>
                        </li> 
                     @endif
                                             
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="header-wrapper">
                <div class="logo">
                        <a href="/">
                            <img src="images/logo/logo.png" alt="logo">
                        </a>
                    </div>
                    <ul class="menu ml-auto">
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li>
                            <a href="/hiw">How to bid</a>
                        </li>
                        <li>
                            <a href="#0">Bids</a>
                            <ul class="submenu">
                                <li>
                                    <a href="/popular">Popular Auctions</a>
                                </li>
                                <li>
                                    <a href="#0">Bikes</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="/bikes-featured">Featured</a>
                                        </li>
                                        <li>
                                            <a href="/bikes-completed">Completed Auctions</a>
                                        </li>
                                        <li>
                                            <a href="/bikes-all">All Bikes</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#0">Phones</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="/phones-featured">Featured</a>
                                        </li>
                                        <li>
                                            <a href="/phones-completed">Completed Auctions</a>
                                        </li>
                                        <li>
                                            <a href="/phones-all">All Phones</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#0">Vouchers</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="/phones-featured">Featured</a>
                                        </li>
                                        <li>
                                            <a href="/phones-completed">Completed Auctions</a>
                                        </li>
                                        <li>
                                            <a href="/phones-all">All Vouchers</a>
                                        </li>
                                    </ul>
                                </li>                               
                            </ul>
                        </li>
                        <li>
                            <a href="/faq">FAQ</a>
                        </li>
                        <li>
                            <a href="/contact">Contact Us</a>
                        </li>
                    </ul>
                    <form class="search-form">
                        <input type="text" placeholder="Search for brand, model....">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    <div class="search-bar d-md-none">
                        <a href="#0"><i class="fas fa-search"></i></a>
                    </div>
                    <div class="header-bar d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </header> --}}
    <!--============= Header Section Ends Here =============-->

    <!--============= Cart Section Starts Here =============-->
    <div class="cart-sidebar-area">
        <div class="top-content">
            <a href="index.html" class="logo">
                <img src="{{ asset('images/logo/logo2.png') }}" alt="logo">
            </a>
            <span class="side-sidebar-close-btn"><i class="fas fa-times"></i></span>
        </div>
        <div class="bottom-content">
            <div class="cart-products">
                <h4 class="title">Shopping cart</h4>
                <div class="single-product-item">
                    <div class="thumb">
                        <a href="#0"><img src="{{ asset('images/shop/shop01.jpg') }}" alt="shop"></a>
                    </div>
                    <div class="content">
                        <h4 class="title"><a href="#0">Color Pencil</a></h4>
                        <div class="price"><span class="pprice">KES 80.00</span> <del class="dprice">KES 120.00</del></div>
                        <a href="#" class="remove-cart">Remove</a>
                    </div>
                </div>
                <div class="single-product-item">
                    <div class="thumb">
                        <a href="#0"><img src="{{ asset('images/shop/shop02.jpg') }}" alt="shop"></a>
                    </div>
                    <div class="content">
                        <h4 class="title"><a href="#0">Water Pot</a></h4>
                        <div class="price"><span class="pprice">KES 80.00</span> <del class="dprice">KES 120.00</del></div>
                        <a href="#" class="remove-cart">Remove</a>
                    </div>
                </div>
                <div class="single-product-item">
                    <div class="thumb">
                        <a href="#0"><img src="{{ asset('images/shop/shop03.jpg') }}" alt="shop"></a>
                    </div>
                    <div class="content">
                        <h4 class="title"><a href="#0">Art Paper</a></h4>
                        <div class="price"><span class="pprice">KES 80.00</span> <del class="dprice">KES 120.00</del></div>
                        <a href="#" class="remove-cart">Remove</a>
                    </div>
                </div>
                <div class="single-product-item">
                    <div class="thumb">
                        <a href="#0"><img src="{{ asset('images/shop/shop04.jpg') }}" alt="shop"></a>
                    </div>
                    <div class="content">
                        <h4 class="title"><a href="#0">Stop Watch</a></h4>
                        <div class="price"><span class="pprice">KES 80.00</span> <del class="dprice">KES 120.00</del></div>
                        <a href="#" class="remove-cart">Remove</a>
                    </div>
                </div>
                <div class="single-product-item">
                    <div class="thumb">
                        <a href="#0"><img src="{{ asset('images/shop/shop05.jpg') }}" alt="shop"></a>
                    </div>
                    <div class="content">
                        <h4 class="title"><a href="#0">Comics Book</a></h4>
                        <div class="price"><span class="pprice">KES 80.00</span> <del class="dprice">KES 120.00</del></div>
                        <a href="#" class="remove-cart">Remove</a>
                    </div>
                </div>
                <div class="btn-wrapper text-center">
                    <a href="#0" class="custom-button"><span>Checkout</span></a>
                </div>
            </div>
        </div>
    </div>
    <!--============= Cart Section Ends Here =============-->