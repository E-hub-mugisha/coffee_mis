<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoffeeProduct extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'quantity',
        'harvest_id',
        'cooperative_id',
    ];
    public function harvest()
    {
        return $this->belongsTo(Harvest::class);
    }
    public function orderItems()
    {
        return $this->hasMany(CoffeeOrderItem::class);
    }
    public function cooperative()
    {
        return $this->belongsTo(Cooperative::class);
    }
}
