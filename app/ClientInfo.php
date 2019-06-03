<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientInfo extends Model
{

    protected $table = 'clients';
    protected $fillable = [
        'client_id',
        'doctor_id',
        'insurance_id',
        'blood_type',
        'phone',
        'birth',
        'address',
        'zip',
        'gender',
        'bsn',
    ];

    public function getClient()
    {
        return $this->hasOne('App\Client', 'id', 'client_id');
    }


    public function getDoctor()
    {
        return $this->hasOne('App\Doctor', 'id', 'doctor_id');
    }

    public function getInsurance()
    {
        return $this->HasOne('App\Insurer', 'id', 'insurance_id');
    }
}
