<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoffeeOrderItem extends Model
{
    protected $fillable = ['order_id', 'coffee_product_id', 'quantity', 'price', 'total'];

    public function coffeeProduct()
    {
        return $this->belongsTo(CoffeeProduct::class);
    }
    public function order()
    {
        return $this->belongsTo(CoffeeOrder::class, 'order_id');
    }
}
