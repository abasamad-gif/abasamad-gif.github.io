<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Add this line!
    protected $fillable = [
        'name', 
        'price', 
        'category', 
        'image', 
        'description', 
        'is_available'
    ];
}