<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Taggable;

class Page extends Model
{
    //
    use Taggable;
    protected $fillable = ['title', 'nav_title', 'has_keywords'];

    public function description()
    {
        return $this->hasOne('App\Description');
    }

    public function statistics()
    {
        return $this->hasMany('App\Statistic');
    }

    public function navigations()
    {
        return $this->hasMany('App\Navigation');
    }

    public function sub_navigations()
    {
        return $this->hasMany('App\SubNavigation');
    }
}
