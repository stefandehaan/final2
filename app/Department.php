<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'department';
    protected $fillable = ['hospital'];

    public function beds()
    {
        return $this->hasMany(Bed::class, 'department');
    }
}
