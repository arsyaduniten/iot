<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    public function researches()
    {
    	return $this->belongsToMany('App\Research');
    }

    public function collaborators()
    {
    	return $this->belongsToMany('App\Collaborator');
    }

    public function publications()
    {
    	return $this->belongsToMany('App\Publication');
    }

    public function awards()
    {
    	return $this->belongsToMany('App\Award');
    }

    public function fundings()
    {
    	return $this->hasMany('App\Funding');
    }

    public function researchers()
    {
    	return $this->belongsToMany('App\Researcher');
    }
}
