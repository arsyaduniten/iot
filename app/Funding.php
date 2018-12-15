<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Taggable;

class Funding extends Model
{
    //
    use Taggable;
    protected $fillable = ['granted_by', 'amount','start_date','end_date'];
    public function project()
    {
    	return $this->belongsTo('App\Project');
    }
}
