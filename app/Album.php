<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Album.
 *
 * @author  The scaffold-interface created at 2019-06-09 11:09:35pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Album extends Model {

    protected $table = 'albums';

    protected $fillable = array('name','description','cover_image');

    public function Photos(){

        return $this->has_many('images');
    }
}
