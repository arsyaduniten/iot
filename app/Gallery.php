<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Taggable;

class Gallery extends Model
{
    //
    use Taggable;
    protected $fillable = ['url'];
}
