<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['farmer_id', 'cooperative_id', 'amount', 'transaction_date', 'type'];

    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }

    public function cooperative()
    {
        return $this->belongsTo(Cooperative::class);
    }
}
