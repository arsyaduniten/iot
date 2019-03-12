<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    //
    protected $fillable = ['page_id', 'content'];

    public function page()
    {
        return $this->belongsTo('App\Page');
    }
}
