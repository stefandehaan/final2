<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client');
            $table->unsignedBigInteger('specialist');
            $table->string('description');
            $table->bigInteger('disease')->unsigned();
            $table->timestamps();


            $table->foreign('client')->references('id')->on('users');
            $table->foreign('specialist')->references('id')->on('users');
            $table->foreign('disease')->references('id')->on('diseases');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treatments');
    }
}
