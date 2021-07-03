<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    use HasFactory;

    protected $table = 'winners';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone_number',
        'bidder_unique_id',
        'bid_amount',
        'name',
        'item_name',
        'item_category',
        'auction_id',
        'bid_start_date',
        'bid_end_date',        
    ];
}
