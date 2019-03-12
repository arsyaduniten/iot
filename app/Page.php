<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
    protected $fillable = ['title', 'nav_title'];

    public function description()
    {
        return $this->hasOne('App\Description');
    }

    public function statistics()
    {
        return $this->hasMany('App\Statistic');
    }
}
