<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    protected $table  = 'bed';

    public function department()
    {
        return $this->belongsTo('App\Department', 'id', 'department');
    }

    public function usages()
    {
        return $this->hasMany("App\BedUsage", "bed");
    }
}
