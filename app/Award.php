<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Taggable;

class Award extends Model
{
    //
    use Taggable;
    protected $fillable = ['title', 'awarded_by', 'date_obtained', 'description'];
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
