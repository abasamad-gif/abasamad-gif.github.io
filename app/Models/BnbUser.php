<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BnbUser extends Model
{
    // Tell Laravel the exact table name in phpMyAdmin
    protected $table = 'users'; 

    // Allow these columns to be filled
    protected $fillable = ['name', 'email', 'password'];

    // Most manual phpMyAdmin tables don't have these. 
    // Setting to false prevents the "Column not found" error.
    public $timestamps = false; 
}