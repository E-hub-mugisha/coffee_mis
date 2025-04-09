<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoffeeOrder extends Model
{
    protected $fillable = ['user_id', 'total_amount', 'status'];

    public function orderItems()
    {
        return $this->hasMany(CoffeeOrderItem::class, 'order_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
