<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client')->unique();
            $table->unsignedBigInteger('doctor');
            $table->unsignedBigInteger('blood_type');
            $table->bigInteger('bsn');
            $table->foreign('client')->references('id')->on('users');
            $table->foreign('doctor')->references('id')->on('users');
            $table->foreign('blood_type')->references('id')->on('blood_types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_user');
    }
}
