<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class post extends BaseModel
{
    use HasFactory,SoftDeletes;


    public function File()
    {
        return $this->HasMany(File::class);
    }
}
