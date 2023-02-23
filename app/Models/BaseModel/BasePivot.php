<?php

namespace App\Models\BaseModel;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BasePivot extends Pivot
{
    public $timestamps = false;

    protected $guarded = ['id'];
}
