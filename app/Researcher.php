<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Taggable;

class Researcher extends Model
{
    //
    use Taggable;
    protected $fillable = ['first_name', 'last_name', 'role', 'image_url', 'profile_url'];
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
