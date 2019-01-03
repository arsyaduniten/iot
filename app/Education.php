<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    //
    protected $table = "user_educations";
    protected $fillable = ['user_id','institution', 'degree', 'description', 'date_start', 'date_completed'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
