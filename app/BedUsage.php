<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bed;
use App\User;

class BedUsage extends Model
{
    protected $table = 'bed_usage';
    protected $fillable = ['client', 'bed', 'start', 'until'];

    public function bed() {
        return $this->belongsTo(Bed::class, 'id', 'bed');
    }

    public function getClient() {
        return $this->hasOne(User::class, 'id',  'client');
    }
}
