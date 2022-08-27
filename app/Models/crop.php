<?php

namespace App\Models;

use App\Models\Group;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class crop extends BaseModel
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'name',
        'body',
        'title',
        'slug',
        'File',
        'status',
        'fee',
        'group_id',
];
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

}
