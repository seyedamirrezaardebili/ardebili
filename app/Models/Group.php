<?php

namespace App\Models;

use App\Models\Article;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends BaseModel
{
    use HasFactory,SoftDeletes;

    protected $fillable=[
            'name',
            'body',
            'title',
            'slug',
            'File',
            'status',
            'id',

];


    public function crop()

    {
        return $this->hasMany(crop::class);
    }
    public function Article()
    {
        return $this->hasMany(Article::class);
    }
    public function project()
    {
        return $this->hasMany(project::class);
    }

    public function orderLastData(){
        return $this->query()->orderByDesc('id')->get();
    }
}

