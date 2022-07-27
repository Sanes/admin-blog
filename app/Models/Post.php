<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Cviebrock\EloquentTaggable\Taggable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use Taggable, InteractsWithMedia;

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
