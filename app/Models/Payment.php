<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['transaction_id', 'amount_paid', 'payment_date', 'payment_method'];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}

