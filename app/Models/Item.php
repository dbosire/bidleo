<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */

    protected $table = 'item';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'retail_price',
        'auction_id',        
        'item_name',
        'item_category',     
        'item_keyphrase',
        'mcj_keyphrase',
        'ghetto_keyphrase',
        'bid_end_date',       
        'item_unique_id',
        'item_description',
        'status',
        'condition',
        'year',
        'fuel',
        'mileage',
        'color',
        'engine',
        'transmission',
        'full_name',
        'dual_sim',
        'storage',
        'front_camera',
        'back_camera',
        'voucher_amount',
        'usable_at',
        'expiration_date',
        'auctioned'
    ];

    // protected $casts = [
    //     'item_pictures' => 'array'
    // ];

    // protected $attributes = [
    //     'item_pictures' => '{
    //         "link1": "1",
    //         "link2": "2",
    //         "link3": "3",
    //         "link4": "4",
    //         "link5": "5",
    //         "link5": "6",
    //     }',
    // ];
}
