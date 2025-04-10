<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;

    protected $fillable = ['farmer_id', 'name', 'size_in_hectares', 'location','cooperative_id'];

    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }
    public function cooperative()
    {
        return $this->belongsTo(Cooperative::class);
    }
    public function harvests()
    {
        return $this->hasMany(Harvest::class);
    }
}
