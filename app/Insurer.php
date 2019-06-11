<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insurer extends Model
{
    protected $table = 'insurers';
    protected $fillable = ['insurance_id', 'name', 'address', 'zip', 'tel', 'email'];
    public $timestamps = false;


}
