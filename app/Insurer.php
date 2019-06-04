<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insurer extends Model
{
    protected $table = 'insurers';
    protected $fillable = ['user_id', 'name', 'address', 'zip', 'tel', 'email'];
    public $timestamps = false;


}
