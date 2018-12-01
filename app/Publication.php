<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Taggable;


class Publication extends Model
{
    //
    use Taggable;
    protected $fillable = ['title', 'description', 'start_date', 'end_date'];
    public function projects()
    {
    	return $this->belongsToMany('App\Project', 'project_publication');
    }

    public function researches()
    {
    	return $this->belongsToMany('App\Research', 'research_publication');
    }
}
