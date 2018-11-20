<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Researcher extends Model
{
    //
    public function projects()
    {
    	return $this->belongsToMany('App\Project');
    }

    public function researches()
    {
    	return $this->belongsToMany('App\Research');
    }

    public function getFullNameAttribute()
	{
	    return "{$this->first_name} {$this->last_name}";
	}
}
