<?php

namespace App\Models;

use App\Models\BaseModel\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Follow extends BaseModel
{
    use HasFactory;

    public function following()
    {
        return $this->hasOne(User::class, 'id', 'following_id')->select('id', 'nama', 'avatar');
    }
    public function followingXp()
    {
        return $this->hasOne(Xp::class, 'user_id', 'following_id')->select('user_id', 'totalXp');
    }

    public function followers()
    {
        return $this->hasOne(User::class, 'id', 'followers_id');
    }
    public function followersXp()
    {
        return $this->hasOne(Xp::class, 'user_id', 'followers_id');
    }
}
