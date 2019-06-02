<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insurer extends Model
{
    protected $table = 'insurers';
    protected $guarded = [];
    public $timestamps = false;

    public function Clients()
    {
        return $this->belongsToMany('App\Client', 'client', 'insurance', 'client');
    }
}
