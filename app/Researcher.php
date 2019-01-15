<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Taggable;

class Researcher extends Model
{
    //
    use Taggable;
    protected $fillable = ['fullname', 'role', 'profile_url', 'image_url', 'bio'];
    public function projects()
    {
    	return $this->belongsToMany('App\Project');
    }

    public function researches()
    {
    	return $this->belongsToMany('App\Research');
    }

 //    public function getFullNameAttribute()
	// {
	//     return "{$this->first_name} {$this->last_name}";
	// }
}
