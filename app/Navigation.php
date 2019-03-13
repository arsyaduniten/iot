<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    //
    protected $fillable = ['page_id', 'display_text', 'link'];
    protected $table = "navigation";

    public function page()
    {
        return $this->belongsTo('App\Page');
    }
}
