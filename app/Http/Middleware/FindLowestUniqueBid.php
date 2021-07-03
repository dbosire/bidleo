<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Bid;

use DB;

class FindLowestUniqueBid
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

        $current_auction = $_POST['auction_id'];

        $lowest_unique_bid = DB::table('bid')
            ->select('bidder', 'bid_unique_id', 'bid_amount')
            ->where('auction_id','=',$current_auction)
            ->orderBy('bid_amount','desc')
            ->distinct('bid_amount')
            ->pluck('bid_amount', 'bidder')
            ->first();

        $winning_bidder = DB::table('bid')
                    ->select('bidder', 'bid_unique_id', 'bid_amount')
                    ->where('auction_id','=',$current_auction)
                    ->orderBy('bid_amount','desc')
                    ->distinct('bid_amount')
                    ->pluck('bidder')
                    ->first();  


        $update_lowest_unique_bid = DB::table('auction')
                                ->where('auction_id', $current_auction )
                                ->update([
                                    'lowest_unique_bid' => 'Bid: '. 'KES'.$lowest_unique_bid.' Bidder: '.'+'.$winning_bidder,                                                                     
                                ]);

        return $response;
    }
}
