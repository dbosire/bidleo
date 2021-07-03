@include('partials.header')

 <!--============= Hero Section Starts Here =============-->
 <div class="hero-section">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="#0">Pages</a>
                </li>
                <li>
                    <span>Create Admin Account</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center"></div>
    </div>
    <!--============= Hero Section Ends Here =============-->


    <!--============= Account Section Starts Here =============-->
    <section class="account-section padding-bottom">
        <div class="container">
            <div class="account-wrapper mt-1 pt-1 mt--100 mt-lg--440">
                <div class="left-side justify-content-center align-items-center">
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
                    <form class="login-form" method="POST" action="{{ route('create.admin') }}">
                        {{ csrf_field() }}
                        <input type="hidden" id="role" name="role" value="admin">
                        <div class="form-group mb-30">
                            <label for="phone_number"><i style="color: #000" class="far fa-phone"></i></label>
                            <h4>Phone Number</h4>
                            <input type="text" id="phone_number" name="phone_number" placeholder="07xxxxx321" required>
                        </div> 
                        <div class="form-group mb-30">
                            <label for="name"><i style="color: #000" class="far fa-phone"></i></label>
                            <h4>Name</h4>
                            <input type="text" id="name" name="name" placeholder="John Doe" required>
                        </div> 
                        <div class="form-group mb-30">
                            <label for="email"><i style="color: #000" class="far fa-phone"></i></label>
                            <h4>Email</h4>
                            <input type="email" id="email" name="email" placeholder="johndoe@gmail.com" required>
                        </div>  
                        <div class="form-group mb-30">
                            <label for="pass_key"><i style="color: #000" class="far fa-phone"></i></label>
                            <h4>Pass Key</h4>
                            <input type="password" id="pass_key" name="pass_key" placeholder="bidleo-xxxx" required>
                        </div>                                           
                        <div class="form-group mb-0">
                            <button type="submit" class="custom-button">Register</button>
                        </div>
                    </form>
                </div>
                <div class="right-side cl-white">
                    <div class="section-header mb-0">
                        <h3 class="title mt-0">Welcome Admin</h3>
                        <p>Remember to change your password</p>
                        <h4>Immediately</h4>
                        <!-- <a href="sign-up.html" class="custom-button transparent">Sign Up</a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Account Section Ends Here =============-->


    

@include('partials.footer')