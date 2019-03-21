<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Taggable;

class Blog extends Model
{
    //
    use Taggable;
    protected $fillable = ['title','content','post_date'];
}
