<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class profile extends Model
{
    use HasFactory,SoftDeletes;


    public function file()
    {
        return $this->hasMany(file::class);
    }
}
