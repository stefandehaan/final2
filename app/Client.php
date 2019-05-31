<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = ['client_id', 'doctor_id', 'insurance_id', 'blood_type', 'phone', 'birth', 'address', 'zip', 'gender', 'bsn'];

    public function userGet(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'client_id');
    }

    public function doctorGet(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'doctor_id');
    }

    public function insuranceGet(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'insurance_id');
    }
}
