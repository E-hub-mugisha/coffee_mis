<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cooperative extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address'];

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
}
