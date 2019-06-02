<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consult extends Model
{
    protected $table = 'consults';

    protected $fillable = ['client', 'doctor', 'subject', 'summary', 'disease', 'date', 'time', 'duration'];


    public function getClient()
    {
        return $this->hasOne('App\Client','id', 'client');
    }
    public function getDoctor()
    {
        return $this->hasOne('App\User', 'id', 'doctor');
    }


}
