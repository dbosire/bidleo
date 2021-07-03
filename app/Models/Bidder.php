<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidder extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */

    protected $table = 'bidders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'phone_number',
        'bidder_unique_id',
        'full_name',
        'unique_pin',
        'eligible'
    ];

    // protected $casts = [
    //     'mpesa_transaction_codes' => 'array',
    //     'mpesa_transaction_dates' => 'array',       
    //     'current_bids' => 'array',
    //     'previous_bids' => 'array'
    // ];
}
