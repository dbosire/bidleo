@include('partials.ccheader')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <!-- Small boxes (Stat box) -->
        <div class="row justify-content-center">

          <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user shadow">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-secondary">
                <h3 class="widget-user-username">Ten </h3>
                <h5 class="widget-user-desc">Total Bids Brought In: </h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="{{ asset('images/favicon.png') }}" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">{{$ghetto_bike_bids}}</h5>
                      <span class="description-text">Bikes</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">{{$ghetto_phone_bids}}</h5>
                      <span class="description-text">Phones</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">{{$ghetto_voucher_bids}}</h5>
                      <span class="description-text">Vouchers</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
          
          <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user shadow">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-warning">
                <h3 class="widget-user-username">Ghetto Radio</h3>
                <h5 class="widget-user-desc">Total Bids Brought In: </h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="{{ asset('images/favicon.png') }}" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">{{$ghetto_bike_bids}}</h5>
                      <span class="description-text">Bikes</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">{{$ghetto_phone_bids}}</h5>
                      <span class="description-text">Phones</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">{{$ghetto_voucher_bids}}</h5>
                      <span class="description-text">Vouchers</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>

          <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user shadow">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-success">
                <h3 class="widget-user-username">MC Jessi</h3>
                <h5 class="widget-user-desc">Total Bids Brought In: </h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="{{ asset('images/favicon.png') }}" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">{{$mcj_bike_bids}}</h5>
                      <span class="description-text">Bikes</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">{{$mcj_phone_bids}}</h5>
                      <span class="description-text">Phones</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">{{$mcj_voucher_bids}}</h5>
                      <span class="description-text">Vouchers</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>

          <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user shadow">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-primary">
                <h3 class="widget-user-username">Regular</h3>
                <h5 class="widget-user-desc">Total Bids Brought In: </h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="{{ asset('images/favicon.png') }}" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">{{$regular_bike_bids}}</h5>
                      <span class="description-text">Bikes</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">{{$regular_phone_bids}}</h5>
                      <span class="description-text">Phones</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">{{$regular_voucher_bids}}</h5>
                      <span class="description-text">Vouchers</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
          
      
        </div>
        <!-- /.row -->

        <div class="row justify-content-center">

          @foreach ($auction as $item)
          @if ($item->status == 'active')
            <div class="col-md-3">
              <div class="card card-danger shadow-none">
                <div class="card-header text-center">
                  <h3 class="card-title text-center">{{$item->item_name}}</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body pl-0 ">
                  <ul style="list-style: none" class="text-center pl-3">
                    <li>Lowest Unique Bid Amount: <br><strong class="mt-1 mb-1" style="font-size: 1.3rem">{{$item->lowest_unique_bid}}</strong></li>
                    <li>Lowest Unique Bidder: <br><strong class="mt-1 mb-1" style="font-size: 1.3rem">{{$item->lowest_unique_bidder}}</strong></li>
                    <li>Total Number of Bids: <br><strong class="mt-1 mb-1" style="font-size: 1.3rem">{{$item->number_of_bids}}</strong></li>
                  </ul>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          @endif              
          @endforeach
          

        </div>
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">            

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Latest Bid Information</h3>
    
                    <div class="card-tools">
                      <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
    
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                      <thead>
                        <tr>
                          <th>#</th>
                    <th>Bidder</th>
                    <th>Bid Amount</th>
                    <th>Status</th>
                    <th>Auction ID</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($bid as $bids)
                                                   
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $bids->bidder }}</td>
                          <td>{{ $bids->bid_amount }}</td>
                          <td>{{ $bids->bid_status }}</td>
                          <td>{{ $bids->auction_id }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                      {{ $bid->links() }}
                  </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
            </div>
                                           


          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <div class="row justify-content-center text-center">
              <div class="col-12">
                <h2 class="section-title">Bids</h2>
                <hr>
              </div>
              
                
                <div class="col-md-4 col-sm-6 col-12">
                  <div class="info-box">
                    
                    <div class="info-box-content">
                      <span class="info-box-text">Last Hour</span>
                    <span class="info-box-number">{{$bids_in_last_hour}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-4 col-sm-6 col-12">
                  <div class="info-box">                    
      
                    <div class="info-box-content">
                      <span class="info-box-text">This Month</span>
                      <span class="info-box-number">{{$bids_this_month}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-4 col-sm-6 col-12">
                  <div class="info-box">                    
      
                    <div class="info-box-content">
                      <span class="info-box-text">Total Bids</span>
                      <span class="info-box-number">{{$bids_total}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                       
              
            </div>
            <!-- /.row -->                        

            <div class="row text-center">
              <div class="col-12">
                <h2 class="section-title">Users</h2>
                <hr>
              </div>
              <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">                  
    
                  <div class="info-box-content">
                    <span class="info-box-text">Last Hour</span>
                    <span class="info-box-number">{{$users_last_hour}}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
              
                  <div class="info-box-content">
                    <span class="info-box-text">Last Month</span>
                    <span class="info-box-number">{{$users_this_month}}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
      
                  <div class="info-box-content">
                    <span class="info-box-text">All Time</span>
                    <span class="info-box-number">{{$users}}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              
            </div>
            <!-- /.row -->  

            <!-- Calendar -->
            <div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i>
                    </button>
                    {{-- <div class="dropdown-menu" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div> --}}
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

                     

            

            <!-- Map card -->
            <div class="card bg-gradient-primary" style=" overflow:hidden; visibility: hidden; position: absolute; z-index:-1; top:50%; left:50%;">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  Visitors
                </h3>
                <!-- card tools -->
                <div class="card-tools">
                  <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                    <i class="far fa-calendar-alt"></i>
                  </button>
                  <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <div class="card-body">
                <div id="world-map" style="height: 250px; width: 100%;"></div>
              </div>
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">Visitors</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white">Sales</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.card -->

            

            
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('partials.ccfooter')
  <!-- Page specific script -->

</body>
</html>
