<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = ['user_id', 'filename', 'image'];

    public function getClient()
    {
        $this->hasOne(User::class, 'id', 'user_id');
    }
}
