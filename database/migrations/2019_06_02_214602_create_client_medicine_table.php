<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientMedicineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_medicine', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client');
            $table->unsignedBigInteger('medicine');
            $table->boolean('retrieved')->default(false);

            $table->foreign('client')->references('id')->on('users');
            $table->foreign('medicine')->references('id')->on('medicine');

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
        Schema::dropIfExists('client_medicine');
    }
}
