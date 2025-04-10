<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'cooperative_id', 'member_id'];

    public function cooperative()
    {
        return $this->belongsTo(Cooperative::class);
    }
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

}

