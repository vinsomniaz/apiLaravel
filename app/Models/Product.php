<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'image_url', 'price', 'category', 'is_new', 'extras'
    ];

    protected $casts = [
        'is_new' => 'boolean',
        'extras' => 'array',
    ];
}
