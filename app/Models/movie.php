<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class movie extends BaseModel
{
    use HasFactory,SoftDeletes;
    protected $table='movies';
    protected $fillable=[
        'name',
        'status',
        'title',
        'text1',
        'text2',
        'text3',
        'url',
    ];
}
