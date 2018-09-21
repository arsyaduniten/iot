<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    //
    public function scopeResearch($query)
    {
    	return $query->where('type', 'research');
    }

    public function scopeIot($query)
    {
    	return $query->where('type', 'iot');
    }

    public function scopeRobotic($query)
    {
    	return $query->where('type', 'robotic');
    }

    public function assets()
    {
    	return $this->hasMany('App\WorkAsset', 'work_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
