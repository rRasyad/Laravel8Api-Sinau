<?php

namespace App\Models;

use App\Models\BaseModel\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'quest_id'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

    protected $hidden = ['updated_at'];
}
