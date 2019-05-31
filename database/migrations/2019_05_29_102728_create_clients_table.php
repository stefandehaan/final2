<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('client_id')->unique()->unsigned();
            $table->bigInteger('doctor_id')->unsigned();
            $table->bigInteger('insurance_id')->unsigned();
            $table->bigInteger('blood_type')->unsigned();
            $table->string('phone');
            $table->date('birth');
            $table->string('address');
            $table->string('zip');
            $table->string('gender');
            $table->bigInteger('bsn')->unique();
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('users');
            $table->foreign('doctor_id')->references('id')->on('users');
            $table->foreign('insurance_id')->references('insurance_id')->on('insurers');
            $table->foreign('blood_type')->references('id')->on('blood_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
