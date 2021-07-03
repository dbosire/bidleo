<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pass_key extends Model
{
    use HasFactory;
	protected $table = 'pass_key';

    protected $fillable = [
        'pass_key',
    ];
}
