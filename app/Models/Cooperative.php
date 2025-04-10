<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cooperative extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'user_id', 'registration_number', 'phone', 'description', 'logo', 'established_at', 'status'];

    public function farmers()
    {
        return $this->hasMany(Farmer::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function members()
    {
        return $this->hasMany(Member::class);
    }
    public function coffeeProducts()
    {
        return $this->hasMany(CoffeeProduct::class);
    }
    public function farms()
    {
        return $this->hasMany(Farm::class);
    }
    public function harvests()
    {
        return $this->hasMany(Harvest::class);
    }
}
