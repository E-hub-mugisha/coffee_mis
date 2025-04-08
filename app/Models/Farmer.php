<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'address', 'cooperative_id'];

    public function cooperative()
    {
        return $this->belongsTo(Cooperative::class);
    }

    public function harvests()
    {
        return $this->hasMany(Harvest::class);
    }

    public function farms()
    {
        return $this->hasMany(Farm::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}

