<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Bed extends Model
{
    protected $table  = 'bed';


    public function department()
    {
        return $this->belongsTo(Department::class, 'id', 'department');
    }

    public function usages()
    {
        return $this->hasMany(BedUsage::class, "bed");
    }
}
