<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class massage extends BaseModel
{
    use HasFactory,SoftDeletes;
protected $fillable=[
    'name',
    'phone',
    'email',
    'massage'
];
}
