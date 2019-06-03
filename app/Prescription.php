<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $table = 'client_medicine';
    protected $fillable = ['client', 'medicine', 'retrieved'];

    public function getClient()
    {
        return $this->hasOne(User::class, 'id', 'client_id');
    }

    public function Clients()
    {
        return $this->hasOne(User::class, 'id', 'client');
    }

    public function getMedicine()
    {
        return $this->hasOne(Medicine::class, 'id', 'medicine');
    }
}
