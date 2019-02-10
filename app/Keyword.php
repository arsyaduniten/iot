<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Taggable;

class Keyword extends Model
{
    //
    use Taggable;
    protected $fillable = ['label'];
}
