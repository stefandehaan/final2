<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Doctor extends Model
{

    use HasRoles;
    protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Clients()
    {
        return $this->belongsToMany(User::class, 'client_user', 'doctor', 'client');
    }


    public function getDoctor()
    {
        return $this->hasOne(User::class, 'id', 'id');
    }

    public function Treatments()
    {
        return $this->hasMany('App\Treatments', 'specialist');
    }

    public function Consults()
    {
        return $this->hasMany('App\Consults', 'doctor');
    }

    public function Receipts()
    {
        return $this->hasMany('App\Receipt', 'doctor');
    }

}
