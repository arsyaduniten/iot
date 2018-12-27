<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Taggable;

class Collaborator extends Model
{
    //
    use Taggable;
    protected $fillable = ['name', 'description', 'logo_url', 'company_url'];
    public function projects()
    {
    	return $this->belongsToMany('App\Project');
    }

    public function researches()
    {
    	return $this->belongsToMany('App\Research');
    }
}
