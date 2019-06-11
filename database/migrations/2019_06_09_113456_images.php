<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Images.
 *
 * @author  The scaffold-interface created at 2019-06-09 11:34:56pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Images extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('images', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->integer('album_id')->unsigned();
            $table->string('image');
            $table->string('description');
            $table->foreign('album_id')->references('id')->on('albums')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('images');
    }
}
