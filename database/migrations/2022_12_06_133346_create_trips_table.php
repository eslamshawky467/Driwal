<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->unsignedbiginteger("driver_id");
            $table->foreign('driver_id')->references('id')->on("drivers")->onDelete('cascade');
            $table->unsignedbiginteger("client_id");
            $table->foreign('client_id')->references('id')->on("clients")->onDelete('cascade');
            $table->unsignedbiginteger("order_id");
            $table->foreign('order_id')->references('id')->on("orders")->onDelete('cascade');
            $table->double('price');
            $table->double('distance');
            $table->enum('status', ['approved', 'canceled']);
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
        Schema::dropIfExists('trips');
    }
}
