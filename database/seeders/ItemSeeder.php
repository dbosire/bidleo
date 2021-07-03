<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

use App\Models\Bid;
use App\Models\Item;
use Log;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {      
        $tomorrow = Carbon::tomorrow();  
        $next_week = Carbon::now()->addDay(7);
        $years_ago = Carbon::now()->subYear(3);

        //==============
        //Bike Seeder
        //==============

        DB::table('item')->insert([
            'item_name' => 'Bike',
            'item_unique_id' => 'Bike-'.Str::random(10), 
            'auction_id' => 'Bike-'. substr( bin2hex( random_bytes( 8 ) ),  0, 8 ),           
            'item_keyphrase' => 'Bike', 
            'mcj_keyphrase' => 'MCJ-Bike',            
            'ghetto_keyphrase' => 'Ghetto-Bike', 
            'ten_keyphrase' => 'Ten-Bike',          
            'item_description' => 'This is a demo short description about a bike.',
            'condition' => 'brand new',
            'year' => $years_ago,
            'fuel' => 'diesel',
            'color' => 'green',
            'mileage' => '0 miles',
            'engine' => '250cc',
            'transmission' => 'automatic',
            'full_name' => 'Ducatti Bike, Green and Black Edition 2021',
            'bid_end_date' => $tomorrow,
            'auctioned' => true,
            'item_category' => 'BIKE',
            'retail_price' => '2000',            
        ]);

        $bike_item_get = Item::select('*')->where('item_category','=','BIKE')->get();        

        $seed_bike_auction = DB::table('auction')->insert([
            'item_name' => $bike_item_get->pluck('item_name')->first(),
            'item_unique_id' => $bike_item_get->pluck('item_unique_id')->first(), 
            'item_keyphrase' => $bike_item_get->pluck('item_keyphrase')->first(), 
            'mcj_keyphrase' => $bike_item_get->pluck('mcj_keyphrase')->first(), 
            'ghetto_keyphrase' => $bike_item_get->pluck('ghetto_keyphrase')->first(), 
            'ten_keyphrase' => $bike_item_get->pluck('ten_keyphrase')->first(), 
            'auction_id' => $bike_item_get->pluck('auction_id')->first(),                 
            'bid_end_date' => $tomorrow,
            'lowest_unique_bid' => 10000000,
            'status' => 'active',            
        ]);

        //==============
        //Phone Seeder
        //==============

        DB::table('item')->insert([
            'item_name' => 'Phone',
            'item_unique_id' => 'Phone-'.Str::random(10), 
            'auction_id' => 'Phone-'. substr( bin2hex( random_bytes( 8 ) ),  0, 8 ),         
            'item_keyphrase' => 'Phone',            
            'mcj_keyphrase' => 'MCJ-Phone',            
            'ghetto_keyphrase' => 'Ghetto-Phone',            
            'ten_keyphrase' => 'Ten-Phone',            
            'item_description' => 'This is a demo short description about a phone.',
            'condition' => 'brand new',
            'year' => $years_ago,
            'color' => 'blue',
            'dual_sim' => 'yes',
            'storage' => '100 GB',
            'front_camera' => '8 mgpx',
            'back_camera' => '16 mgpx',
            'full_name' => 'Samsung Galaxy S21 Black & Gold Edition',
            'bid_end_date' => $tomorrow,
            'auctioned' => true,
            'item_category' => 'PHONE',
            'retail_price' => '1000',            
        ]);

        $phone_item_get = Item::select('*')->where('item_category','=','PHONE')->get();        

        $seed_phone_auction = DB::table('auction')->insert([
            'item_name' => $phone_item_get->pluck('item_name')->first(),
            'item_unique_id' => $phone_item_get->pluck('item_unique_id')->first(),
            'item_keyphrase' => $phone_item_get->pluck('item_keyphrase')->first(), 
            'mcj_keyphrase' => $phone_item_get->pluck('mcj_keyphrase')->first(), 
            'ghetto_keyphrase' => $phone_item_get->pluck('ghetto_keyphrase')->first(), 
            'ten_keyphrase' => $phone_item_get->pluck('ten_keyphrase')->first(),              
            'auction_id' => $phone_item_get->pluck('auction_id')->first(),                 
            'bid_end_date' => $tomorrow,
            'lowest_unique_bid' => 10000000,
            'status' => 'active',            
        ]);

        //==============
        //Voucher Seedr
        //==============

       DB::table('item')->insert([
            'item_name' => 'Voucher',
            'item_unique_id' => 'Voucher-'.Str::random(10), 
            'auction_id' => 'Voucher-'. substr( bin2hex( random_bytes( 8 ) ),  0, 8 ),          
            'item_keyphrase' => 'Shop',  
            'mcj_keyphrase' => 'MCJ-Shop',            
            'ghetto_keyphrase' => 'Ghetto-Shop',         
            'ten_keyphrase' => 'Ten-Shop',         
            'item_description' => 'This is a demo short description about a voucher.',
            'voucher_amount' => '50000',
            'usable_at' =>'Naivas',
            'expiration_date' => $next_week,
            'full_name' => 'KES 50,000 Voucher For Shopping at any Naivas store.',
            'bid_end_date' => $tomorrow,
            'auctioned' => true,
            'item_category' => 'VOUCHER',
            'retail_price' => '1000',            
        ]);

        $seed_voucher_get = Item::select('*')->where('item_category','=','VOUCHER')->get();        

        $seed_voucher_auction = DB::table('auction')->insert([
            'item_name' => $seed_voucher_get->pluck('item_name')->first(),
            'item_unique_id' => $seed_voucher_get->pluck('item_unique_id')->first(),
            'item_keyphrase' => $seed_voucher_get->pluck('item_keyphrase')->first(), 
            'mcj_keyphrase' => $seed_voucher_get->pluck('mcj_keyphrase')->first(), 
            'ghetto_keyphrase' => $seed_voucher_get->pluck('ghetto_keyphrase')->first(), 
            'ten_keyphrase' => $seed_voucher_get->pluck('ten_keyphrase')->first(), 
            'auction_id' => $seed_voucher_get->pluck('auction_id')->first(),                 
            'bid_end_date' => $tomorrow,
            'lowest_unique_bid' => 10000000,
            'status' => 'active',            
        ]);
    }
}
