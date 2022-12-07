<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->text('phonenumber');
            $table->integer('id_number');
            $table->string('status');

            $table->integer('license_number');
            $table->date('license_expiration');
            $table->string('number_plate');
            $table->date('transport_year');
            $table->string('governorate');
            $table->string('neighborhood');
            $table->string('street');
            $table->integer('building_number');
            $table->double('start_cost');

            $table->foreignId('nationality_id')->references('id')->on('nationlities')->onDelete('cascade');
            $table->foreignId('model_id')->references('id')->on('car_models')->onDelete('cascade');
            $table->foreignId('type_id')->references('id')->on('cars')->onDelete('cascade');
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
        Schema::dropIfExists('drivers');
    }
}
