<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Cviebrock\EloquentTaggable\Taggable;

class Post extends Model
{
    use Taggable;

    protected $dates = ['published_at'];
    protected $casts = ['published' => 'boolean'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
