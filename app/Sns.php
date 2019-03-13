<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sns extends Model
{
    //
    protected $table = "user_sns";
    protected $fillable = ['display_name', 'url'];

    public function page()
    {
        return $this->belongsTo('App\Page');
    }
}
