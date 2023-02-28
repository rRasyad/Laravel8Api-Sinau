<?php

namespace App\Models;

use App\Models\BaseModel\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Soal extends BaseModel
{
    use HasFactory;

    // protected $hidden = [
    //     'created_at',
    //     'updated_at',
    // ];

    // protected $casts = [
    //     'created_at' => 'datetime:Y-m-d h:i:s',
    //     'updated_at' => 'datetime:Y-m-d h:i:s',
    // ];

    // public function jawaban($keywords)
    // {
    //     return $this->hasMany(Jawaban::class, 'id_bab', 'bab')
    //         ->whereIn('keyword', $keywords)
    //         ->union(Jawaban::inRandomOrder()->take(3))
    //         ->get();
    // }
    public function artiSoal()
    {
    return $this->hasMany(SoalArti::class, 'soal_id');
    }
}
