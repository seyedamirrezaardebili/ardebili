<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class profile extends BaseModel
{
    use HasFactory,SoftDeletes;


    public function File(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany( File::class);
    }
}
