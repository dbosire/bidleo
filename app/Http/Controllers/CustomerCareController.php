<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auction;
use App\Models\Bidder;
use App\Models\Bid;
use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Log;

class CustomerCareController extends Controller
{
    public function index(){

        //Misclelannious 
        $current_month = Carbon::now()->month;
        $current_hour = Carbon::now()->format('H:i:m');
        $one_hour_earlier = Carbon::now()->subHour()->format('H:i:m');
        // Carbon::now->between($item->from, $item->to)

        //All Users
        $all_users_with_info = DB::table('users')->paginate(5);
        $all_users = User::all()->count();
        $all_bidders = User::where('role', '=', 'bidder')->count();
        $users_this_month = User::whereMonth('created_at', '=', $current_month)
            ->where('role', '=', 'bidder')    
            ->count();
        $users_in_last_hour = User::whereTime('created_at', '<=', $current_hour)->count();
        

        //All Bids 
        $all_bids_with_info = DB::table('bid')->paginate(10);
        $all_bids = Bid::all()->count();
        $all_bids_this_month = Bid::whereMonth('created_at', '=', $current_month)->count();
        $bids_in_last_hour = Bid::whereTime('created_at', '<=', $current_hour)->count();
        $all_bike_bids = Bid::where('item_category', '=', 'BIKE')->count(); 
        $all_phone_bids = Bid::where('item_category', '=', 'PHONE')->count(); 
        $all_voucher_bids = Bid::where('item_category', '=', 'VOUCHER')->count(); 

        $regular_bike_bids = Bid::where('affiliate','=','regular')->where('item_category', '=', 'BIKE')->where('bid_status','=','active')->count();
        $ghetto_bike_bids = Bid::where('affiliate','=','ghetto')->where('item_category', '=', 'BIKE')->where('bid_status','=','active')->count();
        $mcj_bike_bids = Bid::where('affiliate','=','mcj')->where('item_category', '=', 'BIKE')->where('bid_status','=','active')->count();

        $regular_phone_bids = Bid::where('affiliate','=','regular')->where('item_category', '=', 'PHONE')->where('bid_status','=','active')->count();
        $ghetto_phone_bids = Bid::where('affiliate','=','ghetto')->where('item_category', '=', 'PHONE')->where('bid_status','=','active')->count();
        $mcj_phone_bids = Bid::where('affiliate','=','mcj')->where('item_category', '=', 'PHONE')->where('bid_status','=','active')->count();

        $regular_voucher_bids = Bid::where('affiliate','=','regular')->where('item_category', '=', 'VOUCHER')->where('bid_status','=','active')->count();
        $ghetto_voucher_bids = Bid::where('affiliate','=','ghetto')->where('item_category', '=', 'VOUCHER')->where('bid_status','=','active')->count();
        $mcj_voucher_bids = Bid::where('affiliate','=','mcj')->where('item_category', '=', 'VOUCHER')->where('bid_status','=','active')->count();


        //All Items 
        $all_bike_items = Item::where('item_category', '=', 'BIKE')->count(); 
        $all_phone_items = Item::where('item_category', '=', 'PHONE')->count(); 
        $all_voucher_items = Item::where('item_category', '=', 'VOUCHER')->count(); 

        //All Auctions
        $all_auctions_with_info = DB::table('auction')->paginate(5);


        return view('customer-care/index', 
        [
            'auction'=> $all_auctions_with_info,
            'user' => $all_users_with_info,
            'users' => $all_users,
            'users_this_month' => $users_this_month,
            'users_last_hour' => $users_in_last_hour,
            'bid' => $all_bids_with_info,
            'bids_total' => $all_bids,
            'bids_this_month' => $all_bids_this_month,
            'bids_in_last_hour' => $bids_in_last_hour,
            //Affiliates
            'regular_bike_bids' => $regular_bike_bids,
            'mcj_bike_bids' => $mcj_bike_bids,
            'ghetto_bike_bids' => $ghetto_bike_bids,
            'regular_phone_bids' => $regular_phone_bids,
            'mcj_phone_bids' => $mcj_phone_bids,
            'ghetto_phone_bids' => $ghetto_phone_bids,
            'regular_voucher_bids' => $regular_voucher_bids,
            'mcj_voucher_bids' => $mcj_voucher_bids,
            'ghetto_voucher_bids' => $ghetto_voucher_bids,
            //==========
            'all_bikes' => $all_bike_items,
            'all_phones' => $all_phone_items,
            'all_vouchers' => $all_voucher_items
            
            ]);        
    }

    public function all_bids(){
        $bids = DB::table('bid')->get();
        $all_bids =  Bid::all()->count();
        $all_bike_items = Bid::where('item_category', '=', 'BIKE')->count(); 
        $all_phone_items = Bid::where('item_category', '=', 'PHONE')->count(); 
        $all_voucher_items = Bid::where('item_category', '=', 'VOUCHER')->count(); 

        return view('customer-care/all-items',[
            'all_bids' => $all_bids,
            'all_bikes' => $all_bike_items,
            'all_phones' => $all_phone_items,
            'all_vouchers' => $all_voucher_items,
            'bid' => $bids          
            ]);
    }

    public function bike_bids(){
        $bids = DB::table('bid')->where('item_category', '=', 'BIKE')->get();
        $all_bids =  Bid::all()->count();
        $all_bike_items = Bid::where('item_category', '=', 'BIKE')->count(); 
        $all_phone_items = Bid::where('item_category', '=', 'PHONE')->count(); 
        $all_voucher_items = Bid::where('item_category', '=', 'VOUCHER')->count(); 

        return view('customer-care/bike-bids',[
            'all_bids' => $all_bids,
            'all_bikes' => $all_bike_items,
            'all_phones' => $all_phone_items,
            'all_vouchers' => $all_voucher_items,
            'bid' => $bids          
            ]);
    }

    public function phone_bids(){
        $bids = DB::table('bid')->where('item_category', '=', 'PHONE')->get();
        $all_bids =  Bid::all()->count();
        $all_bike_items = Bid::where('item_category', '=', 'BIKE')->count(); 
        $all_phone_items = Bid::where('item_category', '=', 'PHONE')->count(); 
        $all_voucher_items = Bid::where('item_category', '=', 'VOUCHER')->count(); 

        return view('customer-care/phone-bids',[
            'all_bids' => $all_bids,
            'all_bikes' => $all_bike_items,
            'all_phones' => $all_phone_items,
            'all_vouchers' => $all_voucher_items,
            'bid' => $bids          
            ]);
    }

    public function voucher_bids(){
        $bids = DB::table('bid')->where('item_category', '=', 'VOUCHER')->get();
        $all_bids =  Bid::all()->count();
        $all_bike_items = Bid::where('item_category', '=', 'BIKE')->count(); 
        $all_phone_items = Bid::where('item_category', '=', 'PHONE')->count(); 
        $all_voucher_items = Bid::where('item_category', '=', 'VOUCHER')->count(); 

        return view('customer-care/voucher-bids',[
            'all_bids' => $all_bids,
            'all_bikes' => $all_bike_items,
            'all_phones' => $all_phone_items,
            'all_vouchers' => $all_voucher_items,
            'bid' => $bids          
            ]);
    }

    public function all_items(){
        $items = DB::table('item')->get();
        $all_items =  Item::all()->count();
        $all_bike_items = Item::where('item_category', '=', 'BIKE')->count(); 
        $all_phone_items = Item::where('item_category', '=', 'PHONE')->count(); 
        $all_voucher_items = Item::where('item_category', '=', 'VOUCHER')->count(); 

        return view('customer-care/all-items',[
            'all_items' => $all_items,
            'all_bikes' => $all_bike_items,
            'all_phones' => $all_phone_items,
            'all_vouchers' => $all_voucher_items,
            'items' => $items          
            ]);
    }

    public function items(){
        //All Items 
        $all_items =  Item::all()->count();
        $all_bike_items = Item::where('item_category', '=', 'BIKE')->count(); 
        $bikes = DB::table('item')->where('item_category', '=', 'BIKE')->paginate(5);
        $all_phone_items = Item::where('item_category', '=', 'PHONE')->count(); 
        $phones = DB::table('item')->where('item_category', '=', 'PHONE')->paginate(5);
        $all_voucher_items = Item::where('item_category', '=', 'VOUCHER')->count(); 
        $vouchers = DB::table('item')->where('item_category', '=', 'VOUCHER')->paginate(5);

        return view('customer-care/items',[
            'all_items' => $all_items,
            'all_bikes' => $all_bike_items,
            'all_phones' => $all_phone_items,
            'all_vouchers' => $all_voucher_items,
            'bike' => $bikes,
            'phone' => $phones,
            'voucher' => $vouchers
            ]);
    }

    public function active_auctions(){
        //Totals
        $total_auctions = Auction::all()->count();
        $total_bike_auctions = DB::table('auction')->where('auction_id', 'LIKE', 'Bike')->count();
        $total_phone_auctions = DB::table('auction')->where('auction_id', 'LIKE', 'Phone')->count();
        $total_voucher_auctions = DB::table('auction')->where('auction_id', 'LIKE', 'Voucher')->count();

        $auction = DB::table('auction')->where('status','=','active')->get();

        return view('customer-care/active-auctions', [
            //Totals
            'all_auctions' => $total_auctions,
            'all_bikes' => $total_bike_auctions,
            'all_phones' => $total_phone_auctions,
            'all_vouchers' => $total_voucher_auctions,
            //Table
            'auction' => $auction
        ]);
    }

    public function past_auctions(){

        //Totals
        $total_auctions = Auction::all()->count();
        $total_bike_auctions = DB::table('auction')->where('auction_id', 'LIKE', 'Bike')->count();
        $total_phone_auctions = DB::table('auction')->where('auction_id', 'LIKE', 'Phone')->count();
        $total_voucher_auctions = DB::table('auction')->where('auction_id', 'LIKE', 'Voucher')->count();

        //Tables
        $auction = DB::table('auction')->where('status','=','in-active')->paginate(5);               

        return view('customer-care/past-auctions',[
            //Totals
            'all_auctions' => $total_auctions,
            'all_bikes' => $total_bike_auctions,
            'all_phones' => $total_phone_auctions,
            'all_vouchers' => $total_voucher_auctions,
            //Tables
             'auction' => $auction,           

            ]);
    }

    public function all_users(){

        $users = DB::table('users')->get();

        return view('customer-care/all-users', [
            'users' => $users
        ]);
    }

    public function users_active(){

        $current_month = Carbon::now()->month;
        $current_day = Carbon::now()->day;

        //Totals
        $total_users = User::all()->count();
        $users_this_month = User::whereMonth('created_at', '=', $current_month)->count();
        $users_this_day = User::whereDay('created_at', '=', $current_day)->count();
        $flagged_users_total = User::all()->where('status','=','flagged')->count();

        //Tables
        $active_users = DB::table('users')->where('status','=','active')->paginate(5);
        $inactive_users = DB::table('users')->where('status','=','in-active')->paginate(5);
        $flagged_users = DB::table('users')->where('status','=','flagged')->paginate(5);

        return view('customer-care/users-active',[
            //Totals
            'total_users' => $total_users,
            'users_this_month' => $users_this_month,
            'users_today' => $users_this_day,
            'total_flagged_users' => $flagged_users_total,
            //Tables
            'active_users' => $active_users,
            'inactive_users' => $inactive_users,
            'flagged_users' =>$flagged_users
        ]);
    }

    public function users_flagged(){

        $current_month = Carbon::now()->month;
        $current_day = Carbon::now()->day;

        //Totals
        $total_users = User::all()->count();
        $users_this_month = User::whereMonth('created_at', '=', $current_month)->count();
        $users_this_day = User::whereDay('created_at', '=', $current_day)->count();
        $flagged_users_total = User::all()->where('status','=','flagged')->count();

        //Tables
        $active_users = DB::table('users')->where('status','=','active')->paginate(5);
        $inactive_users = DB::table('users')->where('status','=','in-active')->paginate(5);
        $flagged_users = DB::table('users')->where('status','=','flagged')->paginate(5);

        return view('customer-care/users-flagged',[
            //Totals
            'total_users' => $total_users,
            'users_this_month' => $users_this_month,
            'users_today' => $users_this_day,
            'total_flagged_users' => $flagged_users_total,
            //Tables
            'active_users' => $active_users,
            'inactive_users' => $inactive_users,
            'flagged_users' =>$flagged_users
        ]);
    }
}
