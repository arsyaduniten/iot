<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    //
    protected $table = "user_educations";

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
