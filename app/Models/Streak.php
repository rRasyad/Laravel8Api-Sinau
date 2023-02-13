<?php

namespace App\Models;

use App\Models\BaseModel\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Streak extends BaseModel
{
    use HasFactory;

    protected $casts = [
        'tanggalStreak' => 'datetime:Y-m-d',
    ];

    public function xp()
    {
        return $this->hasOne(Xp::class, 'user_id', 'user_id');
    }
}
