<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class project extends BaseModel
{
    use HasFactory,SoftDeletes;

    protected  $fillable=[
        'title',
        'slug',
        'body',
        'name',
        'File',
        'group_id',
        'status',
        'email',
        'id',
    ];

    public function File()
    {
        return $this->HasMany(File::class);
    }
    public function Group()
    {
        return $this->HasMany(Group::class);
    }
}
