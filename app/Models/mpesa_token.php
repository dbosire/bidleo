<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mpesa_token extends Model
{
	use HasFactory;
	protected $table = 'mpesa_tokens';

    protected $fillable = [
        'access_token',
    ];
}
