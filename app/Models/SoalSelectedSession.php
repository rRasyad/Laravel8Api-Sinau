<?php

namespace App\Models;

use App\Models\BaseModel\BasePivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SoalSelectedSession extends BasePivot
{
    protected $table = 'soal_selected_sessions';

    use HasFactory;
}
