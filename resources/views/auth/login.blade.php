@include('partials.header')

 <!--============= Hero Section Starts Here =============-->
 <div class="hero-section mb--100 pb-5">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="#0">Pages</a>
                </li>
                <li>
                    <span>Sign In</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center"></div>
    </div>
    <!--============= Hero Section Ends Here =============-->


    <!--============= Account Section Starts Here =============-->
    <section class="account-section padding-bottom">
        <div class="container">
            <div class="account-wrapper mt-1 pt-1 mt--100 mt-lg--440 row justify-content-center align-items-center">
                <div class="left-side col-lg-8 col-md-10 ">
                    <div class="section-header">
                        <h2 class="title">HI, THERE</h2>
                        <p>You can log in to your BidLeo account here.</p>
                    </div>
                    <!-- <ul class="login-with">
                        <li>
                            <a href="#0"><i class="fab fa-facebook"></i>Log in with Facebook</a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-google-plus"></i>Log in with Google</a>
                        </li>
                    </ul>
                    <div class="or">
                        <span>Or</span>
                    </div> -->
                    <div class="row justify-content-center">
                        <div class="col-12">
                          @if (\Session::has('error'))
                              <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                  <ul>
                                      <li>{!! \Session::get('error') !!}</li>
                                  </ul>
                                  
                              </div>
                          @endif
                        </div>
                      </div>
                    <form class="login-form" method="POST" action="{{ route('login.submit') }}">
                        {{ csrf_field() }}
                        <div class="form-group mb-30">
                            <label for="phone_number"><i style="color: #000" class="far fa-phone"></i></label>
                            <h4>Phone Number</h4>
                            <input type="text" id="phone_number" name="phone_number" placeholder="07xxxxx321" required>
                        </div>    
                        <div class="form-group mb-30">
                            <label for="password"><i class="far fa-phone"></i></label>
                            <h4>Password</h4>
                            <input type="password" id="password" name="password" required>
                        </div> 
                        
                        <div class="form-group mb-0">
                            <button type="submit" class="custom-button">LOG IN</button>
                        </div>
                    </form>
                </div>                
            </div>
        </div>
    </section>
    <!--============= Account Section Ends Here =============-->


    

@include('partials.footer')