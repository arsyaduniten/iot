<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubNavigation extends Model
{
    //
	protected $fillable = ['page_id', 'display_text', 'content_id'];
    protected $table = "sub_navigations";

    public function page()
    {
        return $this->belongsTo('App\Page');
    }
}
