@include('partials.header')

<!--============= Hero Section Starts Here =============-->
<div class="hero-section mb-100 pb-5">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <span>Partner With Us</span>
                </li>
            </ul>
        </div>        
</div>
    <!--============= Hero Section Ends Here =============-->


    <!--============= Contact Section Starts Here =============-->
    <section class="contact-section padding-bottom ">
        <div class="container">
            <div class="contact-wrapper mt-1 pt-1 padding-top padding-bottom mt--100 mt-lg--440">
                <div class="section-header">
                    <h5 class="cate">Partner With Us</h5>
                    <h2 class="title">get in touch</h2>
                    <p>We'd love to hear from you! Let us know how we can help.</p>
                </div>
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <form class="contact-form" id="contact_form">
                            <div class="form-group">
                                <label for="name"><i class="far fa-user"></i></label>
                                @if (Auth::user())
                                    <input type="text" id="name" name="name" value="{{ Auth::user()->name }} " placeholder="{{ Auth::user()->name }}" class="form-input text-center"  readonly>
                                @else
                                <input type="text" placeholder="Your Name" name="name" id="name">                                      
                                @endif                                
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="fas fa-envelope-open-text"></i></label>
                                @if (Auth::user())
                                    <input type="email" id="email" name="email" value="{{ Auth::user()->name }} " placeholder="{{ Auth::user()->name }}" class="form-input text-center"  readonly>
                                @else
                                <input type="email" placeholder="Enter Your Email Address" name="email" id="email">                                     
                                @endif  
                                
                            </div>
                            <div class="form-group">
                                <label for="message" class="message"><i class="far fa-envelope"></i></label>
                                <textarea name="message" id="message" placeholder="Type Your Message"></textarea>
                            </div>
                            <div class="form-group text-center mb-0">
                                <button type="submit" class="custom-button">Send Message</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-4 col-lg-5 d-lg-block d-none">
                        <img src="{{ asset('images/partnership1.png') }}" class="w-100" alt="images">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Contact Section Ends Here =============-->

@include('partials.footer')
</body>
<!-- Mirrored from www.pixner.net/BidLeo/main// by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Apr 2021 09:09:46 GMT -->
</html>