<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    //
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function researches()
    {
    	return $this->belongsToMany('App\Research');
    }

    public function projects()
    {
    	return $this->belongsToMany('App\Project');
    }
}
