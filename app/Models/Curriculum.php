<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Curriculum extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $guarded = [];

    public function registeredMediaConversion(Media $media, $media = null){
        $this->addMediaConversion('thumb')
        ->width(368)
        ->height(232)
        ->sharpen(10)
        ->sanitizingFileName(str_replace(['#', '\\']))
    }
}
