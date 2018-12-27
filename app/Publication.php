<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Taggable;


class Publication extends Model
{
    //
    use Taggable;
    protected $fillable = ['title', 'publication_date', 'conference', 'conference_url', 'citations', 'paper_url'];
    public function projects()
    {
    	return $this->belongsToMany('App\Project', 'project_publication');
    }

    public function researches()
    {
    	return $this->belongsToMany('App\Research', 'research_publication');
    }
}
