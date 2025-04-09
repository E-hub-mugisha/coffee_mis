<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class PurchaseOrder extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'buyer_id',
        'coffee_id',
        'quantity',
        'price',
        'status',
        'order_date',
    ];
    protected $casts = [
        'order_date' => 'datetime',
    ];
    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }
    public function coffee()
    {
        return $this->belongsTo(Harvest::class, 'coffee_id');
    }
}
