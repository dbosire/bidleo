<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;
     /**
     * The database table used by the model.
     *
     * @var string
     */

    protected $table = 'bid';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'auction_id',
        'item_name',
        'bidder',
        'bid_amount',
        'bid_unique_id',
        'affiliate',
        'bid_start_time',       
        'item_unique_id',
        'bid_status',
        'starting_bid',
        'item_category',
    ];


}
