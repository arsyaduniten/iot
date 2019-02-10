<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Taggable;

class About extends Model
{
    //
    protected $table = "about";
    use Taggable;
    protected $fillable = ['type', 'description'];
}
