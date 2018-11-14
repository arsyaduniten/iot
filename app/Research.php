<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    //
    public function projects()
    {
    	return $this->belongsToMany('App\Project');
    }

    public function publications()
    {
    	return $this->belongsToMany('App\Publication');
    }

    public function collaborators()
    {
    	return $this->belongsToMany('App\Collaborator');
    }

    public function awards()
    {
    	return $this->belongsToMany('App\Award');
    }
}
