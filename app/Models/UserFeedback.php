<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFeedback extends Model
{

    protected $fillable = [
        'user_id',
        'coffee_product_id',
        'rating',
        'comment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coffeeProduct()
    {
        return $this->belongsTo(CoffeeProduct::class);
    }
}
