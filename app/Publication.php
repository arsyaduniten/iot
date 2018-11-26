<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    //
    public function projects()
    {
    	return $this->belongsToMany('App\Project', 'project_publication');
    }

    public function researches()
    {
    	return $this->belongsToMany('App\Research', 'research_publication');
    }
}
