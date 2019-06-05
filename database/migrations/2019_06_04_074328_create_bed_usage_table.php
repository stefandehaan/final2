<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBedUsageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bed_usage', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client');
            $table->unsignedBigInteger('bed');
            $table->dateTime('start');
            $table->dateTime('until')->nullable();

            $table->foreign('bed')->references('id')->on('bed');
            $table->foreign('client')->references('id')->on('users');
            $table->timestamps();

            $table->unique(['client', 'bed', 'until']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bed_usage');
    }
}
