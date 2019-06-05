<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'department';

    public function beds()
    {
        return $this->hasMany('App\Bed', 'department');
    }
}
