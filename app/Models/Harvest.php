<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Harvest extends Model
{
    use HasFactory;

    protected $fillable = ['farmer_id', 'harvest_date', 'coffee_grade', 'quantity','harvest_name', 'harvest_type', 'cooperative_id', 'farm_id'];

    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }
    public function coffeeProducts()
    {
        return $this->hasMany(CoffeeProduct::class);
    }
    public function cooperative()
    {
        return $this->belongsTo(Cooperative::class);
    }
    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }
}

