<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Harvest extends Model
{
    use HasFactory;

    protected $fillable = ['farmer_id', 'harvest_date', 'coffee_grade', 'quantity'];

    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }
}

