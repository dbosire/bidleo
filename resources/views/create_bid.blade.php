@include('partials.ccheader')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create An Auction</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create-Bid</li>
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
        <div class="col-4">
          @if (\Session::has('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <ul>
                      <li>{!! \Session::get('success') !!}</li>
                  </ul>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          @endif
        </div>
      </div>
        <div class="row justify-content-center">
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$bikes}}<sup style="font-size: 20px"></sup></h3>

                <p>Total Bikes</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$phones}}</h3>

                <p>Total Phones</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$vouchers}}</h3>

                <p>Total Vouchers</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

        
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <section class="contact-section padding-bottom">
                <div class="container">
                    <div class="contact-wrapper padding-top padding-bottom mt--100 mt-lg--440">
                        <div class="section-header">
                            
                            <h2 class="title">Fill in the details to create an auction & item</h2>                           
                        </div>
                        <div class="row">
                            <div class="col-xl-8 col-lg-7">
                              <div class="accordion" id="accordionExample">
                                <div class="card">
                                  <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                      <button class="btn btn-link btn-block text-center" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                       <h3>Create a Bike</h3> 
                                      </button>
                                    </h2>
                                  </div>
                              
                                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                      <form class="contact-form" id="contact_form" action="/create-bike" method="POST">
                                        @csrf
                                        {{-- <div class="input-group input-group-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-lg">Item Owner</span>
                                        </div>
                                        <input type="text" placeholder="Your Phone Number" name="item_owner" id="item_owner" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                                        </div> --}}
                                           <br>
                                        <div class="input-group input-group-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-lg">Item Name</span>
                                        </div>
                                        <input input type="text" placeholder="Item Name" name="item_name" id="name" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                           <br>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01">Category</label>
                                                </div>
                                                <select class="custom-select" name="item_category" id="inputGroupSelect01">                                                    
                                                    <option value="BIKE">Bike</option>                                                                                     
                                                </select>
                                            </div>
                                            <br>
                                            <div class="input-group input-group-lg">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-lg">Auction End Date</span>
                                            </div>
                                            <input type="datetime-local" dateFormat="d/m/Y, H:i:s" name="bid_end_date" id="bid_end_date" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                           <br>
                
                                            <div class="input-group input-group-lg">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-lg">Retail Price</span>
                                            </div>
                                            <input type="text" placeholder="eg. 250 (No Decimal Places)" name="retail_price" id="retail_price"class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                                            </div> 

                                            <div class="input-group mt-3">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">Item Description</span>
                                              </div>
                                              <textarea class="form-control" name="item_description" aria-label="With textarea" required></textarea>
                                            </div>

                                            <div class="row mt-3">
                                              <div class="col-md-6 mb-2 mt-2">
                                                <div class="input-group input-group-lg">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text" id="inputGroup-sizing-lg">Condition</span>
                                                  </div>
                                                  <input type="text" placeholder="eg. Brand New" name="condition" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" required>
                                                  </div> 
                                              </div>
                                              <div class="col-md-6 mb-2 mt-2">
                                                <div class="input-group input-group-lg">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text" id="inputGroup-sizing-lg">Year</span>
                                                  </div>
                                                  <input type="text" placeholder="eg 2017" name="year" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" required>
                                                  </div> 
                                              </div>
                                              <div class="col-md-6 mb-2">
                                                <div class="input-group input-group-lg">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text" id="inputGroup-sizing-lg">Fuel</span>
                                                  </div>
                                                  <input type="text" placeholder="eg. Diesel" name="fuel" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" required>
                                                  </div> 
                                              </div>
                                              <div class="col-md-6 mb-2">
                                                <div class="input-group input-group-lg">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text" id="inputGroup-sizing-lg">Color</span>
                                                  </div>
                                                  <input type="text" placeholder="eg. blue" name="color" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" required>
                                                  </div> 
                                              </div>
                                              <div class="col-md-6 mb-2">
                                                <div class="input-group input-group-lg">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text" id="inputGroup-sizing-lg">Mileage</span>
                                                  </div>
                                                  <input type="text" placeholder="eg. 2500 miles or 0 if Brand New" name="mileage"class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" required>
                                                  </div> 
                                              </div>
                                              <div class="col-md-6 mb-2">
                                                <div class="input-group input-group-lg">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text" id="inputGroup-sizing-lg">Engine</span>
                                                  </div>
                                                  <input type="text" placeholder="eg. 250cc" name="engine" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" required>
                                                  </div> 
                                              </div>
                                              <div class="col-md-6 mb-2">
                                                <div class="input-group input-group-lg">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text" id="inputGroup-sizing-lg">Transmission</span>
                                                  </div>
                                                  <input type="text" placeholder="eg. automatic" name="transmission" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" required>
                                                  </div> 
                                              </div>
                                              <div class="col-md-6 mb-2">
                                                <div class="input-group input-group-lg">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text" id="inputGroup-sizing-lg">Full Name</span>
                                                  </div>
                                                  <input type="text" placeholder="eg. Suzuki Gold Edition, 2021" name="full_name" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" required>
                                                  </div> 
                                              </div>
                                            </div>
        
                                            <br>                            
                                            <div class="form-group text-center mb-0">
                                                <button type="submit" class="btn btn-success">Create Item</button>
                                            </div>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                                <div class="card">
                                  <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                      <button class="btn btn-link btn-block text-center collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                       <h3>Create a Phone</h3>
                                      </button>
                                    </h2>
                                  </div>
                                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                      <form class="contact-form" id="contact_form" action="/create-phone" method="POST">
                                        @csrf
                                        {{-- <div class="input-group input-group-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-lg">Item Owner</span>
                                        </div>
                                        <input type="text" placeholder="Your Phone Number" name="item_owner" id="item_owner" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                                        </div> --}}
                                           <br>
                                        <div class="input-group input-group-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-lg">Item Name</span>
                                        </div>
                                        <input input type="text" placeholder="Item Name" name="item_name" id="name" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                           <br>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01">Category</label>
                                                </div>
                                                <select class="custom-select" name="item_category" id="inputGroupSelect01">
                                                    <option value="PHONE">Phone</option>                                                                                                                       
                                                </select>
                                            </div>
                                            <br>
                                            <div class="input-group input-group-lg">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-lg">Auction End Date</span>
                                            </div>
                                            <input type="datetime-local" dateFormat="d/m/Y, H:i:s" name="bid_end_date" id="bid_end_date" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                           <br>
                
                                            <div class="input-group input-group-lg">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-lg">Retail Price</span>
                                            </div>
                                            <input type="text" placeholder="eg. 250 (No Decimal Places)" name="retail_price" id="retail_price"class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                                            </div> 

                                            <div class="input-group mt-3">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">Item Description</span>
                                              </div>
                                              <textarea class="form-control" name="item_description" aria-label="With textarea" required></textarea>
                                            </div>

                                            <div class="row mt-3">
                                              <div class="col-md-6 mb-2 mt-2">
                                                <div class="input-group input-group-lg">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text" id="inputGroup-sizing-lg">Condition</span>
                                                  </div>
                                                  <input type="text" placeholder="eg. Brand New" name="condition" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" required>
                                                  </div> 
                                              </div>
                                              <div class="col-md-6 mb-2 mt-2">
                                                <div class="input-group input-group-lg">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text" id="inputGroup-sizing-lg">Year</span>
                                                  </div>
                                                  <input type="text" placeholder="eg 2017" name="year" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" required>
                                                  </div> 
                                              </div>
                                              <div class="col-md-6 mb-2">
                                                <div class="input-group input-group-lg">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text" id="inputGroup-sizing-lg">Dual Sim</span>
                                                  </div>
                                                  <input type="text" placeholder="eg. Yes" name="dual_sim" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" required>
                                                  </div> 
                                              </div>
                                              <div class="col-md-6 mb-2">
                                                <div class="input-group input-group-lg">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text" id="inputGroup-sizing-lg">Color</span>
                                                  </div>
                                                  <input type="text" placeholder="eg. blue" name="color" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" required>
                                                  </div> 
                                              </div>
                                              <div class="col-md-6 mb-2">
                                                <div class="input-group input-group-lg">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text" id="inputGroup-sizing-lg">Storage</span>
                                                  </div>
                                                  <input type="text" placeholder="eg. 80 GB" name="storage"class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" required>
                                                  </div> 
                                              </div>
                                              <div class="col-md-6 mb-2">
                                                <div class="input-group input-group-lg">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text" id="inputGroup-sizing-lg">Front Camera</span>
                                                  </div>
                                                  <input type="text" placeholder="eg. 5 mgpx" name="front_camera" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" required>
                                                  </div> 
                                              </div>
                                              <div class="col-md-6 mb-2">
                                                <div class="input-group input-group-lg">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text" id="inputGroup-sizing-lg">Back Camera</span>
                                                  </div>
                                                  <input type="text" placeholder="eg. 16 mgpx" name="back_camera" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" required>
                                                  </div> 
                                              </div>
                                              <div class="col-md-6 mb-2">
                                                <div class="input-group input-group-lg">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text" id="inputGroup-sizing-lg">Full Name</span>
                                                  </div>
                                                  <input type="text" placeholder="eg. Samsung Galaxy S21 Green Edition" name="full_name" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" required>
                                                  </div> 
                                              </div>
                                            </div>
        
                                            <br>                            
                                            <div class="form-group text-center mb-0">
                                                <button type="submit" class="btn btn-success">Create Item</button>
                                            </div>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                                <div class="card">
                                  <div class="card-header" id="headingThree">
                                    <h2 class="mb-0">
                                      <button class="btn btn-link btn-block text-center collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                       <h3>Create a Voucher</h3> 
                                      </button>
                                    </h2>
                                  </div>
                                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                      <form class="contact-form" id="contact_form" action="/create-voucher" method="POST">
                                        @csrf
                                        {{-- <div class="input-group input-group-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-lg">Item Owner</span>
                                        </div>
                                        <input type="text" placeholder="Your Phone Number" name="item_owner" id="item_owner" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                                        </div> --}}
                                           <br>
                                        <div class="input-group input-group-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-lg">Item Name</span>
                                        </div>
                                        <input input type="text" placeholder="Item Name" name="item_name" id="name" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                           <br>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01">Category</label>
                                                </div>
                                                <select class="custom-select" name="item_category" id="inputGroupSelect01">                                                                                   
                                                    <option value="VOUCHER">Voucher</option>                                   
                                                </select>
                                            </div>
                                            <br>
                                            <div class="input-group input-group-lg">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-lg">Auction End Date</span>
                                            </div>
                                            <input type="datetime-local" dateFormat="d/m/Y, H:i:s" name="bid_end_date" id="bid_end_date" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                           <br>
                
                                            <div class="input-group input-group-lg">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-lg">Retail Price</span>
                                            </div>
                                            <input type="text" placeholder="eg. 250 (No Decimal Places)" name="retail_price" id="retail_price"class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                                            </div> 
                                            <div class="input-group mt-3">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">Item Description</span>
                                              </div>
                                              <textarea class="form-control" name="item_description" aria-label="With textarea" required></textarea>
                                            </div>

                                            <div class="row mt-3">
                                              
                                              <div class="col-md-6 mb-2">
                                                <div class="input-group input-group-lg">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text" id="inputGroup-sizing-lg">Amount</span>
                                                  </div>
                                                  <input type="text" placeholder="eg. 50000" name="voucher_amount"class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" required>
                                                  </div> 
                                              </div>
                                              <div class="col-md-6 mb-2">
                                                <div class="input-group input-group-lg">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text" id="inputGroup-sizing-lg">Usable At</span>
                                                  </div>
                                                  <input type="text" placeholder="eg. Any Naivas Store" name="usable_at" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" required>
                                                  </div> 
                                              </div>
                                              <div class="col-md-6 mb-2">
                                                <div class="input-group input-group-lg">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text" id="inputGroup-sizing-lg">Expiration Date</span>
                                                  </div>
                                                  <input type="datetime-local" dateFormat="d/m/Y, H:i:s" name="expiration_date" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" required>                                                 
                                                  </div> 
                                              </div>
                                              <div class="col-md-6 mb-2">
                                                <div class="input-group input-group-lg">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text" id="inputGroup-sizing-lg">Full Name</span>
                                                  </div>
                                                  <input type="text" placeholder="eg. Naivas KES 50,000 Voucher" name="full_name" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" required>
                                                  </div> 
                                              </div>
                                            </div>
        
                                            <br>                            
                                            <div class="form-group text-center mb-0">
                                                <button type="submit" class="btn btn-success">Create Item</button>
                                            </div>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                                
                            </div>
                            <div class="col-xl-4 col-lg-5 d-lg-block d-none">
                                <img src="{{ asset('images/banner/banner-5.png') }}" class="w-100" alt="images">
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </section>
            <br>

            <div class="col-12">
              <div class="card card-danger">
                <div class="card-header">
                  <h4 class="card-title">Current Items</h4>
                </div>
                <div class="card-body">
                  <div>
                    <div class="btn-group w-100 mb-2">
                      <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> All items </a>
                      <a class="btn btn-info" href="javascript:void(0)" data-filter="1"> Bikes </a>
                      <a class="btn btn-info" href="javascript:void(0)" data-filter="2"> Phones </a>
                      <a class="btn btn-info" href="javascript:void(0)" data-filter="3"> Vouchers </a>                      
                    </div>
                    <div class="mb-2">
                      <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle> Shuffle items </a>
                      <div class="float-right">
                        <select class="custom-select" style="width: auto;" data-sortOrder>
                          <option value="index"> Sort by Position </option>
                          <option value="sortData"> Sort by Custom Data </option>
                        </select>
                        <div class="btn-group">
                          <a class="btn btn-default" href="javascript:void(0)" data-sortAsc> Ascending </a>
                          <a class="btn btn-default" href="javascript:void(0)" data-sortDesc> Descending </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="filter-container p-0 row">
                      @foreach ($items as $item)

                      @if ($item->item_category == 'BIKE')
                      <div class="filtr-item col-sm-2" data-category="1" data-sort="bike sample">
                      @endif
                      @if ($item->item_category == 'PHONE')
                      <div class="filtr-item col-sm-2" data-category="2" data-sort="phone sample">
                      @endif
                      @if ($item->item_category == 'VOUCHER')
                      <div class="filtr-item col-sm-2" data-category="3" data-sort="voucher sample">
                      @endif
                        
                          @if($item->item_category == 'BIKE')  
                          <form action="{{route('edit-item')}}" method="POST">
                            @csrf
                              <input type="hidden" value="{{$item->item_unique_id}}" name="item_unique_id">
                              <button type="submit" class="mx-auto text-center m-1 btn-warning btn">View</button>
                            </form> 

                            @if ($item->status == 'not-auctioned')
                            <form action="{{route('auction-item')}}" method="POST">
                              @csrf
                                <input type="hidden" value="{{$item->item_unique_id}}" name="item_unique_id">
                                <button type="submit" class="mx-auto text-center m-1 btn-success btn">Auction</button>
                            </form> 
                            @else 
                            <form action="{{route('close-item')}}" method="POST">
                              @csrf
                                <input type="hidden" value="{{$item->item_unique_id}}" name="item_unique_id">
                                <button type="submit" class="mx-auto text-center m-1 btn-danger btn">Close</button>
                            </form>
                            @endif
                              

                          <a class="mb-2" href="{{ asset('images/auction/bike.jpeg') }}" data-toggle="lightbox" data-title="{{$item->item_name}}">
                          <img src="{{ asset('images/auction/bike.jpeg') }}" class="img-fluid mb-2" alt="white sample"/>
                                                                              
                        </a>                       
                          @endif
                          @if($item->item_category == 'PHONE')
                          <form action="{{route('edit-item')}}" method="POST">
                            @csrf
                              <input type="hidden" value="{{$item->item_unique_id}}" name="item_unique_id">
                              <button type="submit" class="mx-auto text-center m-1 btn-warning btn">View</button>
                            </form> 
                            @if ($item->status == 'not-auctioned')
                            <form action="{{route('auction-item')}}" method="POST">
                              @csrf
                                <input type="hidden" value="{{$item->item_unique_id}}" name="item_unique_id">
                                <button type="submit" class="mx-auto text-center m-1 btn-success btn">Auction</button>
                            </form> 
                            @else 
                            <form action="{{route('close-item')}}" method="POST">
                              @csrf
                                <input type="hidden" value="{{$item->item_unique_id}}" name="item_unique_id">
                                <button type="submit" class="mx-auto text-center m-1 btn-danger btn">Close</button>
                            </form>
                            @endif
                          <a href="{{ asset('images/auction/phone.jpeg') }}" data-toggle="lightbox" data-title="{{$item->item_name}}">
                          <img src="{{ asset('images/auction/phone.jpeg') }}" class="img-fluid mb-2" alt="white sample"/>                         
                        </a>    
                          @endif
                          @if($item->item_category == 'VOUCHER')
                          <form action="{{route('edit-item')}}" method="POST">
                            @csrf
                              <input type="hidden" value="{{$item->item_unique_id}}" name="item_unique_id">
                              <button type="submit" class="mx-auto text-center m-1 btn-warning btn">View</button>
                            </form> 
                            @if ($item->status == 'not-auctioned')
                            <form action="{{route('auction-item')}}" method="POST">
                              @csrf
                                <input type="hidden" value="{{$item->item_unique_id}}" name="item_unique_id">
                                <button type="submit" class="mx-auto text-center m-1 btn-success btn">Auction</button>
                            </form> 
                            @else 
                            <form action="{{route('close-item')}}" method="POST">
                              @csrf
                                <input type="hidden" value="{{$item->item_unique_id}}" name="item_unique_id">
                                <button type="submit" class="mx-auto text-center m-1 btn-danger btn">Close</button>
                            </form>
                            @endif
                          <a href="{{ asset('images/auction/voucher.png') }}" data-toggle="lightbox" data-title="{{$item->item_name}}">
                          <img src="{{ asset('images/auction/voucher.png') }}" class="img-fluid mb-2" alt="white sample"/>  
                          </a>                       
                          @endif                          
                        
                      </div>
                      @endforeach
                      
                    </div>
                  </div>
  
                </div>
              </div>
            </div>
        </div>
        <!-- /.row (main row) -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('partials.ccfooter')
  <!-- Page specific script -->
  <!-- Ekko Lightbox -->
<script src="{{asset ('admin/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
  <!-- Filterizr-->
<script src="{{asset ('admin/plugins/filterizr/jquery.filterizr.min.js') }}"></script>
  <script>
    $(function () {
      
      $(document).ready(function(){
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
            });
        $('.edit-item').click(function(){
           
            var item_unique_id = $(this).attr('id')
            var url = '{{route("edit-item")}}'

            $.ajax({
              //this part
              url: url,
              type:"POST",
              data: { item_unique_id: item_unique_id},
              success:function(response){
                console.log("success");
                window.alert("Successfull");
                location.reload();
              },
              error:function(){
                  console.log("error");
                  window.alert("Oops Something Went Wrong");
                  location.reload();
              }
          });
        }) 
      })

       

      $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
          alwaysShowClose: true
        });

      });
  
      $('.filter-container').filterizr({gutterPixels: 3});
      $('.btn[data-filter]').on('click', function() {
        $('.btn[data-filter]').removeClass('active');
        $(this).addClass('active');
      });

      
    })
  </script>
</body>
</html>
