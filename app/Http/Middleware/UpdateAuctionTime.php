<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;

use App\Models\Auction;

use DB;

class UpdateAuctionTime
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $current_time = Carbon::now();

        $auction_count = Auction::all()->count();

        $all_auctions = Auction::all();  
        
        foreach($all_auctions as $auctions){

            $auctions_date = DB::table('auction')
            ->where('auction_id',$auctions->auction_id)
            ->select('bid_end_date')
            ->first();

            if(Carbon::create($auctions->bid_end_date)->isPast() == true){

                $update_auction = DB::table('auction')
                                ->where('auction_id', $auctions->auction_id )                               
                                ->update([                                                                       
                                    'status' => 'inactive',                                                                                                  
                                ]);
                     

                $update_item = DB::table('item')
                        ->where('auction_id', $auctions->auction_id )                               
                        ->update([                                                                       
                            'status' => 'sold',                                                                                                  
                        ]);

                $update_bids = DB::table('bid')  
                                ->where('auction_id', $auctions->auction_id )  
                                ->update([                                                                       
                                    'bid_status' => 'closed',                                                                                                  
                                ]);
          }     

        }
            
        

        return $response;
    }
}
