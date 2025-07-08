<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'client_name',
        'client_phone',
        'client_address',
        'division_id',
        'district_id',
        'upazilla_id',
        'packages',
        'total_price',
    ];

    protected $casts = [
        'packages' => 'array',
    ];
}
