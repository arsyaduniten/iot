<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    protected $fillable = ['research_area', 'description', 'start_date', 'end_date', 'external_link'];
    //
    public function projects()
    {
    	return $this->belongsToMany('App\Project', 'research_project');
    }

    public function publications()
    {
    	return $this->belongsToMany('App\Publication', 'research_publication');
    }

    public function collaborators()
    {
    	return $this->belongsToMany('App\Collaborator', 'research_collaborator');
    }

    public function awards()
    {
        return $this->belongsToMany('App\Award', 'research_award');
    }

    public function researchers()
    {
    	return $this->belongsToMany('App\Researcher', 'research_researcher');
    }
}
