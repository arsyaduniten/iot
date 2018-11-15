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
    	return $this->belongsToMany('App\Collaborator', 'project_collaborator');
    }

    public function publications()
    {
    	return $this->belongsToMany('App\Publication', 'project_publication');
    }

    public function awards()
    {
    	return $this->belongsToMany('App\Award', 'project_award');
    }

    public function fundings()
    {
    	return $this->hasMany('App\Funding', 'project_fundings');
    }

    public function researchers()
    {
    	return $this->belongsToMany('App\Researcher','project_researcher');
    }
}
