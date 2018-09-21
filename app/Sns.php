<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sns extends Model
{
    //
    protected $table = "user_sns";

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
