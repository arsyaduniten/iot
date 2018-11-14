<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    //
    public function scopeResearch($query)
    {
        return $query->where('type', '=', 'research');
    }

    public function scopeProject($query)
    {
        return $query->where('type', '=', 'project');
    }

    public function scopeAward($query)
    {
        return $query->where('type', '=', 'award');
    }

    public function scopePublication($query)
    {
        return $query->where('type', '=', 'publication');
    }
}
