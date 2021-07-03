<div class="col-sm-10 col-md-7 col-lg-4">
    <div class="dashboard-widget mb-30 mb-lg-0">
        <div class="user">
            
            <div class="content">
                <h5 class="title"><a href="#0">{{ Auth::user()->phone_number }}</a></h5>
                                                
            </div>
        </div>
        <ul class="dashboard-menu">
            <li>
                <!-- <button id="show-landing" class="btn">                                 -->
                <a href="/dashboard" class="active"><i class="flaticon-dashboard"></i>Dashboard</a>
                <!-- </button> -->
            </li>
            <li>                        
                <!-- <button id="show-profile" class="btn"> -->
                <a href="/dashboard-profile"><i class="flaticon-settings"></i>Personal Profile </a>
                <!-- </button> -->
            </li>
            {{-- <li>
            <a href="/create-bid"><i class="flaticon-settings"></i>Create a bid</a>
            </li> --}}
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