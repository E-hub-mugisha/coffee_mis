<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoffeeProduct extends Model
{
    //
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'quantity',
        'harvest_id',
    ];
    public function harvest()
    {
        return $this->belongsTo(Harvest::class);
    }
    public function orderItems()
    {
        return $this->hasMany(CoffeeOrderItem::class);
    }
}
