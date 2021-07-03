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
                                <!-- <button id="show-profile" class="btn"> -->
                                <a href="/dashboard-profile" class="active"><i class="flaticon-settings"></i>Personal Profile </a>
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
                              <a href="/wallet" ><i class="flaticon-money"></i>My Wallet</a>
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
<!-- Personal Profile -->
<!-- =========================== -->

<div class="col-lg-8" id="personal-profile" class="s2">
                    <div class="row">
                        <div class="col-12">
                            <div class="dash-pro-item mb-30 dashboard-widget">
                                <div class="header">
                                    <h4 class="title">Personal Details</h4>
                                    <button type="button" class="btn edits" style="border: none;" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><span class="edit"><i class="flaticon-edit"></i> Edit</span></button>
  
                                        
                                    </button>                                    
                                </div>
                                <ul class="dash-pro-body">
                                    <li>
                                        <div class="info-name">Name</div>
                                        <div class="info-value">{{ Auth::user()->name }}</div>
                                    </li>
                                    <li>
                                        <div class="info-name">Email</div>
                                        <div class="info-value">{{ Auth::user()->email }}</div>
                                    </li>                                   
                                    <li>
                                        <div class="info-name">Mobile</div>
                                        <div class="info-value">{{ Auth::user()->phone_number }}</div>
                                    </li>
                                </ul>
                            </div>

                           
                        </div>

                        <div class="col-12">
                            <div class="dash-pro-item dashboard-widget">
                                <div class="header">
                                    <h4 class="title">Security</h4>
                                
                                </div>
                                <ul class="dash-pro-body">
                                    <li>
                                        <div class="info-name">Password</div>
                                        <div class="info-value">{{ \Crypt::decrypt(Auth::user()->password) }}</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <br>


                        <div class="col-12">
                            <br>
                            <div class="dash-pro-item mb-30 dashboard-widget">
                                <div class="header">
                                    <h4 class="title">Account Settings</h4>
                                    {{-- <button type="button" id="edit_password" class="edit" data-toggle="modal" data-target="#exampleModal" style="border: none; disply:inline-block;">
                                        <span class="edit"><i class="flaticon-edit"></i> Edit</span>
                                    </button>    --}}
                                </div>
                                <ul class="dash-pro-body">
                                    <li>
                                        <div class="info-name">Language</div>
                                        <div class="info-value">English (United States)</div>
                                    </li>
                                    <li>
                                        <div class="info-name">Time Zone</div>
                                        <div class="info-value">Nairobi (GMT+3)</div>
                                    </li>
                                    @if(Auth::user()->eligible == true)
                                    <li>
                                        <div class="info-name">Status</div>
                                        <div class="info-value"><i class="flaticon-check text-success"></i> Active</div>
                                    </li>
                                    @else 
                                    <li>
                                        <div class="info-name">Status</div>
                                        <div class="info-value"><i class="flaticon-check text-danger"></i> Inactive</div>
                                    </li>
                                    @endif
                                    
                                </ul>
                                
                            </div>
                        </div>
                                                
                        
                    </div>
                </div>

                
            </div>
        </div>
    </section>
    <!--============= Dashboard Section Ends Here =============-->


    {{-- Edit Info Modal --}}
    <!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel2">Edit Profile Info</h5>
          
        </div>
        <div class="modal-body">
            
                <form class="login-form" method="POST" action="{{ route('update.profile') }}">
                    {{ csrf_field() }}

                    <ul class="dash-pro-body">
                        <li>
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                  <label for="inputPassword6" class="col-form-label">Name: </label>
                                </div>
                                
                                    <input type="hidden" id="phone_number" name="phone_number" class="form-control" value="{{ Auth::user()->phone_number }}">
                                
                                <div class="col-auto">
                                  <input type="text" id="name" name="name" class="form-control" placeholder="{{ Auth::user()->name }}">
                                </div>                                                        
                              </div>
                        </li>
                        <li>
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                  <label for="inputPassword6" class="col-form-label">Email: </label>
                                </div>
                                <div class="col-auto">
                                  <input type="email" id="email" name="email" class="form-control" placeholder="{{ Auth::user()->email }}">
                                </div>                                                        
                              </div>
                        </li>                                                                                                
                    </ul>                                                                                                                    

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save changes</button>
        </form>
        </div>
      </div>
    </div>
  </div>



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Details</h5>     
      </div>
      <div class="modal-body">
        <form class="login-form" method="POST" action="{{ route('update.profile') }}">
            {{ csrf_field() }}

            <ul class="dash-pro-body">
                <li>
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                          <label for="inputPassword6" class="col-form-label">Name: </label>
                        </div>
                        
                            <input type="hidden" id="phone_number" name="phone_number" class="form-control" value="{{ Auth::user()->phone_number }}">
                        
                        <div class="col-auto">
                          <input type="text" id="name" style="width: 100%" name="name" class="form-control" placeholder="{{ Auth::user()->name }}">
                        </div>                                                        
                      </div>
                </li>
                <li>
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                          <label for="inputPassword6" class="col-form-label">Email: </label>
                        </div>
                        <div class="col-auto">
                          <input type="email" id="email" name="email" class="form-control" placeholder="{{ Auth::user()->email }}">
                        </div>                                                        
                      </div>
                </li>                                                                                                
            </ul>                                                                                                                    

</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-success">Save changes</button>
</form>
      </div>
      
    </div>
  </div>
</div>

   <!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Set Your Personal Password</h5>
          {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> --}}
        </div>
        <div class="modal-body">
          Please change your password to something you can remember.

          Your current password is: <strong>{{ \Crypt::decrypt(Auth::user()->password) }}</strong>

          <form class="login-form" method="POST" action="{{ route('update.password') }}">
            {{ csrf_field() }}
            <input type="hidden" id="phone_number" name="phone_number" class="form-control" value="{{ Auth::user()->phone_number }}">
            <input type="hidden" id="first_pass_change" name="first_pass_changeg" class="form-control" value="true">

            <ul class="dash-pro-body">                
                <li>
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                          <label for="password" class="col-form-label">New Password: </label>
                        </div>
                        <div class="col-auto">
                          <input type="password" id="password" name="password" class="form-control">
                        </div>                                                        
                      </div>
                </li>                                                                                                
            </ul>           
        
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Submit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>         
        </div>
    </form>
      </div>
    </div>
  </div>


@include('partials.footer')

@if(Auth::user()->first_pass_change == false)
<script type="text/javascript">
    $(window).on('load', function() {
        $('#exampleModal1').modal('show');
    });

    // $('#edit_perosnal').click(function() {
    //     $('#edit-info"').modal('show');
    // });
</script>
@endif
</body>
<!-- Mirrored from www.pixner.net/BidLeo/main// by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Apr 2021 09:09:46 GMT -->
</html>