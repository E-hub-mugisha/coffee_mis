<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'national_id',
        'phone',
        'gender',
        'role',
        'address',
        'join_date',
        'profile_photo',
    ];

    public function cooperative()
    {
        return $this->belongsTo(Cooperative::class);
    }
}
