<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Curriculum extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $guarded = [];

    protected $appends = [
        'picture'
    ];
    public function registeredMediaConversion(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
        ->width(368)
        ->height(232)
        ->sharpen(10)
        ->sanitizingFileName(str_replace(['#', '\\']));
    }
    public function getPictureAttribute(){
        return $this->getFirstMedia('images')->getUrl();
    }
}
