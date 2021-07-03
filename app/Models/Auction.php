<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'auction';

    protected $fillable = [        
        'item_name',
        'item_keyphrase',
        'mcj_keyphrase',
        'ghetto_keyphrase',
        'item_unique_id',
        'auction_id',              
        'bid_end_date',
        'number_of_bids',
        'status',
        'lowest_unique_bid',
        'lowest_unique_bidder',
    ];
}
