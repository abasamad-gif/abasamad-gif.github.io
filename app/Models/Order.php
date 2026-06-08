<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'total_amount'];

    public function user() {
        return $this->belongsTo(BnbUser::class, 'user_id');
    }

    public function items() {
        return $this->hasMany(OrderItem::class);
    }
}
