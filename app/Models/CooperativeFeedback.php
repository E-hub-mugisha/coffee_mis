<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CooperativeFeedback extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $fillable = [
        'cooperative_id',
        'user_id',
        'comment',
        'rating',
    ];

    public function cooperative()
    {
        return $this->belongsTo(Cooperative::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
