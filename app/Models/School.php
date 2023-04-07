<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_name',
        'school_id',
        'address',
        'region',
        'province',
        'city',
        'hotline',
        'mobile_number',
        'social_media'
    ];

    protected $appends = ['location'];

    public function getLocationAttribute(){
        return `{$this->region}, {$this->province}, {$this->city}`;
    }
}
