<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use InteractsWithMedia;
    
    public $timestamps = false;
    protected static $defaultImage = '/storage/categories/category-100.png';


    public function getFirstOrDefaultMediaUrl(string $collectionName = 'default', string $conversionName = ''): string
    {
        $url = $this->getFirstMediaUrl($collectionName, $conversionName);

        return $url ? $url : $this::$defaultImage ?? '';
    }    

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('categories')
            ->singleFile();
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }    
}
