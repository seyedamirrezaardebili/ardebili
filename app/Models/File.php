<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends BaseModel
{
    use HasFactory, SoftDeletes;

    public function profile(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(profile::class);
    }
}
