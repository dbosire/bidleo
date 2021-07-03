<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Bid;
use App\Models\Auction;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Log;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewItemNotification;

use DB;

class ItemController extends Controller
{

    public function index(){
        $all_bikes = Item::where('item_category', '=', 'BIKE')->count();
        $all_phones = Item::where('item_category', '=', 'PHONE')->count();
        $all_vouchers = Item::where('item_category', '=', 'VOUCHER')->count();  
        $items = Item::all();     


    return view('create_bid', 
    [
        'bikes' => $all_bikes,
        'phones' => $all_phones,
        'vouchers' =>$all_vouchers,
        'items' => $items
        
        ]); 
    }



    //Product Details Page
    public function details( Request $request){

        $current_item = $_POST['item_unique_id'];

        $item = DB::table('item')->where('item_unique_id','=',$current_item)->first();

        Log::info('Looked for page');

        return view('item', [
            'item' => $item,
        ]);
    }
    
    //Edit Product Details Page
    public function edit( Request $request){
       
        $current_item = $_POST['item_unique_id'];

        $item = DB::table('item')->where('item_unique_id','=',$current_item)->first();
        

        return view('item-edit', [
            'item' => $item,
        ]);
    }

    public function create_phone(Request $request){
        $bid_end_date = $_POST['bid_end_date'];
        $bid_start_time = Carbon::now();
        $retail_price = $_POST['retail_price'];
        $item_name = $_POST['item_name'];
        $item_category = $_POST['item_category'];
        $item_description = $_POST['item_description']; 

        $condition = $request->input('condition');
        $year = $request->input('year');
        $color = $request->input('color');
        $dual_sim = $request->input('dual_sim');
        $storage = $request->input('storage');
        $front_camera = $request->input('front_camera');   
        $back_camera = $request->input('back_camera'); 
        $full_name = $request->input('full_name'); 

        $auction_id = 'Phone-'. substr( bin2hex( random_bytes( 8 ) ),  0, 8 );
        $item_keyphrase = 'Phone';
        $ghetto_keyphrase = 'Ghetto-Phone';
        $mcj_keyphrase = 'MCJ-Phone';
        $ten_keyphrase = 'Ten-Phone';
        $item_unique_id = 'Phone-'. substr( bin2hex( random_bytes( 6 ) ),  0, 6 );
        
        $item = Item::where('item_unique_id', '=', $item_unique_id)->first();

        if ($item === null) {
            // item doesn't exist

            $new_item = new Item([
                'item_unique_id' => $item_unique_id,  
                'auction_id'        => $auction_id,                
                'retail_price'     => $retail_price,
                'item_name'     => $item_name,
                'item_category' => $item_category,              
                'item_keyphrase' => $item_keyphrase,
                'ghetto_keyphrase'        => $ghetto_keyphrase,
                'mcj_keyphrase'           => $mcj_keyphrase,
                'ten_keyphrase'        => $ten_keyphrase,
                'item_description' => $item_description,
                'condition' => $condition,
                'year' => $year,
                'color' => $color,
                'dual_sim' => $dual_sim,
                'storage' => $storage,
                'status' => 'not-auctioned',
                'front_camera' => $front_camera,
                'back_camera' => $back_camera,
                'full_name' => $full_name,
                'auctioned' => false,
                'bid_end_date'       => $bid_end_date, 
            ]);
    
            $new_item->save();

            $bid_unique_id = substr( bin2hex( random_bytes( 10 ) ),  0, 10 );
            
           

            $new_auction = new Auction([                           
                'item_name'               => $item_name,
                'item_unique_id'          => $item_unique_id,
                'auction_id'              => $auction_id,   
                'status'                  => 'in-active',
                'lowest_unique_bid'       => 100000,
                'lowest_unique_bidder'    => 'None at the moment',
                'item_keyphrase'          => $item_keyphrase,
                'ghetto_keyphrase'        => $ghetto_keyphrase,
                'mcj_keyphrase'           => $mcj_keyphrase,  
                'ten_keyphrase'           => $ten_keyphrase,
                'bid_end_date'            => $bid_end_date,                                          
            ]);

            $new_auction->save();

            return redirect('/create-bid');
        }else{


           $bid_unique_id = substr( bin2hex( random_bytes( 10 ) ),  0, 10 );

           $new_auction = new Auction([                           
            'item_name'               => $item_name,
            'item_unique_id'          => $item_unique_id,
            'auction_id'              => $auction_id,   
            'status'                  => 'in-active',
            'lowest_unique_bid'       => 100000,
            'lowest_unique_bidder'    => 'None at the moment',
            'item_keyphrase'          => $item_keyphrase,
            'ghetto_keyphrase'        => $ghetto_keyphrase,
            'mcj_keyphrase'           => $mcj_keyphrase, 
            'ten_keyphrase'           => $ten_keyphrase,
            'bid_end_date'            => $bid_end_date,                                        
        ]);

        $new_auction->save();

            return redirect('/create-item');           
        }


    }

    public function create_voucher(Request $request){
        $bid_end_date = $_POST['bid_end_date'];
        $bid_start_time = Carbon::now();
        $retail_price = $_POST['retail_price'];
        $item_name = $_POST['item_name'];
        $item_category = $_POST['item_category']; 
        $item_description = $_POST['item_description'];

        $amount = $request->input('voucher_amount');
        $usable_at = $request->input('usable_at');
        $expiration_date = $_POST['expiration_date'];
        $full_name = $request->input('full_name');

        $auction_id = 'Voucher-'. substr( bin2hex( random_bytes( 8 ) ),  0, 8 );
        $item_keyphrase = 'Shop';
        $ghetto_keyphrase = 'Ghetto-Shop';
        $mcj_keyphrase = 'MCJ-Shop';
        $ten_keyphrase = 'Ten-Shop';
        $item_unique_id = 'Voucher-'. substr( bin2hex( random_bytes( 6 ) ),  0, 6 );

        $item = Item::where('item_unique_id', '=', $item_unique_id)->first();

        if ($item === null) {
            // item doesn't exist

            $new_item = new Item([
                'item_unique_id' => $item_unique_id,  
                'auction_id'        => $auction_id,                
                'retail_price'     => $retail_price,
                'item_name'     => $item_name,
                'item_category' => $item_category,              
                'item_keyphrase' => $item_keyphrase,
                'ghetto_keyphrase'        => $ghetto_keyphrase,
                'mcj_keyphrase'           => $mcj_keyphrase,                            
                'ten_keyphrase'           => $ten_keyphrase,
                'item_description' => $item_description,
                'voucher_amount' => $amount,
                'status' => 'not-auctioned',
                'usable_at' => $usable_at,
                'expiration_date' => $expiration_date,
                'full_name' => $full_name,
                'auctioned' => false,               
                'bid_end_date'       => $bid_end_date, 
            ]);
    
            $new_item->save();

            $bid_unique_id = substr( bin2hex( random_bytes( 10 ) ),  0, 10 );
            
           

            $new_auction = new Auction([                           
                'item_name'               => $item_name,
                'item_unique_id'          => $item_unique_id,
                'auction_id'              => $auction_id,   
                'status'                  => 'in-active',
                'lowest_unique_bid'       => 100000,
                'lowest_unique_bidder'    => 'None at the moment',
                'item_keyphrase'          => $item_keyphrase,
                'ghetto_keyphrase'        => $ghetto_keyphrase,
                'mcj_keyphrase'           => $mcj_keyphrase,            
                'ten_keyphrase'           => $ten_keyphrase,
                'bid_end_date'            => $bid_end_date,                                          
            ]);

            $new_auction->save();

            return redirect('/create-bid');
        }else{


           $bid_unique_id = substr( bin2hex( random_bytes( 10 ) ),  0, 10 );

           $new_auction = new Auction([                           
            'item_name'               => $item_name,
            'item_unique_id'          => $item_unique_id,
            'auction_id'              => $auction_id,   
            'status'                  => 'in-active',
            'lowest_unique_bid'       => 100000,
            'lowest_unique_bidder'    => 'None at the moment',
            'item_keyphrase'          => $item_keyphrase,
            'ghetto_keyphrase'        => $ghetto_keyphrase,
            'mcj_keyphrase'           => $mcj_keyphrase,  
            'ten_keyphrase'           => $ten_keyphrase,
            'bid_end_date'            => $bid_end_date,                                       
        ]);

        $new_auction->save();

            return redirect('/create-item');           
        }
    }

    public function create_bike( Request $request ){       
            
        $bid_end_date = $_POST['bid_end_date'];
        $bid_start_time = Carbon::now();
        $retail_price = $_POST['retail_price'];
        $item_name = $_POST['item_name'];
        $item_category = $_POST['item_category']; 
        $item_description = $_POST['item_description'];

        $condition = $request->input('condition');
        $year = $request->input('year');
        $fuel = $request->input('fuel');
        $color = $request->input('color');
        $mileage = $request->input('mileage');
        $engine = $request->input('engine');
        $transmission = $request->input('transmission');
        $full_name = $request->input('full_name');
        
        $auction_id = 'Bike-'. substr( bin2hex( random_bytes( 8 ) ),  0, 8 );
        $item_keyphrase = 'Bike';
        $ghetto_keyphrase = 'Ghetto-Bike';
        $mcj_keyphrase = 'MCJ-Bike';
        $ten_keyphrase = 'Ten-Bike';
        $item_unique_id = 'Bike-'. substr( bin2hex( random_bytes( 6 ) ),  0, 6 );

        $item = Item::where('item_unique_id', '=', $item_unique_id)->first();

        if ($item === null) {
            // item doesn't exist

            $new_item = new Item([
                'item_unique_id' => $item_unique_id,  
                'auction_id'        => $auction_id,                
                'retail_price'     => $retail_price,
                'item_name'     => $item_name,
                'item_category' => $item_category,              
                'item_keyphrase' => $item_keyphrase,
                'ghetto_keyphrase'        => $ghetto_keyphrase,
                'mcj_keyphrase'           => $mcj_keyphrase,
                'ten_keyphrase'           => $ten_keyphrase,
                'item_description' => $item_description,
                'condition' => $condition,
                'year' => $year,
                'fuel' => $fuel,
                'color' => $color,
                'mileage' => $mileage,
                'engine' => $engine,
                'status' => 'not-auctioned',
                'transmission' => $transmission,
                'full_name' => $full_name,
                'auctioned' => false,
                'bid_end_date'       => $bid_end_date, 
            ]);
    
            $new_item->save();

            $bid_unique_id = substr( bin2hex( random_bytes( 10 ) ),  0, 10 );
            
           

            $new_auction = new Auction([                           
                'item_name'               => $item_name,
                'item_unique_id'          => $item_unique_id,
                'auction_id'              => $auction_id,   
                'status'                  => 'in-active',
                'lowest_unique_bid'       => 100000,
                'lowest_unique_bidder'    => 'None at the moment',
                'item_keyphrase'          => $item_keyphrase,
                'ghetto_keyphrase'        => $ghetto_keyphrase,
                'mcj_keyphrase'           => $mcj_keyphrase,            
                'ten_keyphrase'           => $ten_keyphrase,
                'bid_end_date'            => $bid_end_date,                                           
            ]);

            $new_auction->save();

            return redirect('/create-bid');
        }else{


           $bid_unique_id = substr( bin2hex( random_bytes( 10 ) ),  0, 10 );

           $new_auction = new Auction([                           
            'item_name'               => $item_name,
            'item_unique_id'          => $item_unique_id,
            'auction_id'              => $auction_id,   
            'status'                  => 'in-active',
            'lowest_unique_bid'       => 100000,
            'lowest_unique_bidder'    => 'None at the moment',
            'item_keyphrase'          => $item_keyphrase,
            'ghetto_keyphrase'        => $ghetto_keyphrase,
            'mcj_keyphrase'           => $mcj_keyphrase,            
            'ten_keyphrase'           => $ten_keyphrase,
            'bid_end_date'            => $bid_end_date,                                       
        ]);

        $new_auction->save();

            return redirect('/create-item');           
        }

    }

    public function auction(Request $request){
        $current_item = $request->input('item_unique_id');
        

        $update_auction_status = DB::table('auction')
                                     ->where('item_unique_id',$current_item)
                                     ->update([
                                         'status' => 'active'
                                     ]);

        $update_item_status = DB::table('item')                             
                                ->where('item_unique_id',$current_item)
                                ->update([
                                    'status' => 'available',
                                    'auctioned' => true
                                ]);

        return redirect()->back()->with('success', 'Item Successfully Auctioned.'); 

    }

    public function close(Request $request){

        $current_item = $request->input('item_unique_id');
        

        $update_auction_status = DB::table('auction')
                                     ->where('item_unique_id',$current_item)
                                     ->update([
                                         'status' => 'in-active'
                                     ]);

        $update_item_status = DB::table('item')                             
                                ->where('item_unique_id',$current_item)
                                ->update([
                                    'status' => 'not-auctioned',                                    
                                ]);


        return redirect()->back()->with('success', 'Auction Successfully Closed'); 

    }

    public function extend(Request $request){
        
        $current_item = $request->input('item_unique_id');
        

        $update_auction_status = DB::table('auction')
                                     ->where('item_unique_id',$current_item)
                                     ->update([
                                         'in-active' => 'active'
                                     ]);

        $update_item_status = DB::table('item')                             
                                ->where('item_unique_id',$current_item)
                                ->update([
                                    'status' => 'not-auctioned',                                    
                                ]);


        return redirect()->back()->with('success', 'your message,here'); 

    }

    public function sendNotification() {

        $user = User::first();
  
        $itemData = [
            'name' => '#007 Bill',
            'body' => 'You have received a new bill.',
            'thanks' => 'Thank you',
            'text' => '$600',
            'url' => url('/'),
            'item_id' => 30061
        ];
  
        Notification::send($user, new NewItemNotification($itemData));
   
        return redirect()->back()->with('success', 'Users Successfully Notified');
    }


}
