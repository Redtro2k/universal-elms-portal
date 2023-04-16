<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['location'];

    public function getLocationAttribute(){
        return `{$this->region}, {$this->province}, {$this->city}`;
    }
}
