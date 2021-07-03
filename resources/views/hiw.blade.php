@include('partials.header')

 <!-- ======= Featuress Section ======= -->
    <section id="features" class="section-bg">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 offset-lg-4">
            <div class="section-header wow fadeIn" data-wow-duration="1s">
              <h3 class="section-title">How It Works</h3>
              <span class="section-divider"></span>
            </div>
          </div>

          <div class="col-lg-4 col-md-5 features-img">
            <img src=" {{ asset('images/product-features.png') }}" alt="" class="wow fadeInLeft">
          </div>

          <div class="col-lg-8 col-md-7 ">

            <div class="row">

              <div class="col-lg-6 col-md-6 box wow fadeInRight">
                <div class="icon"><i class="icofont-ui-touch-phone"></i></div>
                <h4 class="title"><a href="">How To Bid</a></h4>
                <p  class="description">To bid, simply send <strong style="font-size: 1.1rem;">20 Kenya shillings</strong> to the paybill number <strong style="font-size: 1.1rem;">337575</strong> with the <strong style="font-size: 1.1rem;">Item Keyphrase & Bid Amount</strong> as the account number. <br> eg. <strong style="font-size: 1.1rem">Bike 610</strong> to bid for a Bike with a bid amount of 610bob.</p>
              </div>
              <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.1s">
                <div class="icon"><i class="icofont-win-trophy"></i></div>
                <h4 class="title"><a href="">How To Win</a></h4>
                <p class="description">To win you must have placed the lowest unique bid. This means your bid must first be entirely unique, and the lowest when the auction comes to a close. Don't worry, we shall notify you whenever you have been out-bidded.</p>
              </div>
              {{-- <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.2s">
                <div class="icon"><i class="ion-social-buffer-outline"></i></div>
                <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur teleca starter sinode park ledo.</p>
              </div>
              <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.3s">
                <div class="icon"><i class="ion-ios-analytics-outline"></i></div>
                <h4 class="title"><a href="">Magni Dolores</a></h4>
                <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum dinoun trade capsule.</p>
              </div> --}}
            </div>

          </div>

        </div>

      </div>

    </section><!-- End Featuress Section -->

@include('partials.footer')
</body>
<!-- Mirrored from www.pixner.net/BidLeo/main// by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Apr 2021 09:09:46 GMT -->
</html>