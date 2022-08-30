<?php

namespace App\Models;

use App\Models\Article;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends BaseModel
{
    use HasFactory, SoftDeletes;
    protected $table='files';
    protected $fillable=[
        'name',
        'key',
        'status',
        'title',
        'url',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function post()
    {
        return $this->belongsTo(post::class);
    }

}
