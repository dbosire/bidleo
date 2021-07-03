<?php

namespace App\Http\Controllers\Bidder\Bidder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Participant;
use App\Jobs\TrackBidJob;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Auth\LoginController as DefaultLoginController;

use Illuminate\Support\Facades\Auth;

use App\Models\Bidder;
use App\Models\Bid;

class BidderController extends Controller
{
    /**
     * Tracking JOIN requests from Safaricom
     * 
     */
    public function track_join_requests( Request $request ){



        TrackBidJob::dispatch( $request );
        Log::info('Bidder Controller Dispatched: '.$request);

    }
    
}
