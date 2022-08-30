<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class profile extends BaseModel
{
    use HasFactory,SoftDeletes;

    protected $fillable=[
            'name',
            'phone',
            'email',
            'mobile',
            'fax',
            'about_me',
            'number_project',
            'profit',
            'Fund',
            'Growth',
            'file',
            'id',

    ];


}
