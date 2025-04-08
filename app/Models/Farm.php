<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;

    protected $fillable = ['farmer_id', 'name', 'size_in_hectares', 'location'];

    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }
}
