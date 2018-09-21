<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkAsset extends Model
{
    //
    public function work()
    {
    	return $this->belongsTo('App\Work');
    }
}
