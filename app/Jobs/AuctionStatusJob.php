<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\Auction;
use App\Models\Winner;

class AuctionStatusJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {

          Log::info("Checked Auction Status'");
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $all_auctions = Auction::all();

        $active_auctions = DB::table('auction')
        ->where('status', '=', 'active')
        ->get();

        //Close an Auction
        
        
        
    }
}
