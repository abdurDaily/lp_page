<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'price',
        'discount',
        'stock_status',
        'details',
        'faqs',
        'images'
    ];

    protected $casts = [
        'faqs' => 'array',
        'images' => 'array',
        'stock_status' => 'boolean',
    ];
}
