<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    //
    protected $fillable = ['page_id', 'content', 'description'];
    protected $attributes = [
       'page_id' => 1,
    ];

    public function page()
    {
        return $this->belongsTo('App\Page');
    }
}
