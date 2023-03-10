<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'joined_at' => 'datetime:Y-m-d h:i:s',
        'created_at' => 'datetime:Y-m-d h:i:s',
        'updated_at' => 'datetime:Y-m-d h:i:s',
    ];

    /**
     * Get the phone associated with the user.
     */
    public function xp()
    {
        return $this->hasOne(Xp::class, 'user_id');
    }

    public function streak()
    {
        return $this->hasMany(Streak::class, 'user_id');
    }

    /**
     * Get the rank associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rank()
    {
        return $this->hasOne(Rank::class, 'user_id');
    }
}
