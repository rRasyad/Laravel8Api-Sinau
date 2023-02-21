<?php

namespace App\Models;

use App\Models\BaseModel\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends BaseModel
{
    use HasFactory;

    public function unitBab()
    {
        return $this->hasMany(UnitBab::class, 'unit_id', 'unit');
    }
}
