<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('location_lat');
            $table->string('location_long');
            $table->string('location');
            $table->string('lat');
            $table->string('long');
            $table->string('my_location');
            $table->unsignedbiginteger("client_id");
            $table->foreign('client_id')->references('id')->on("clients")->onDelete('cascade');
            $table->enum('status',['active','inactive','finished']);
            $table->unsignedbiginteger("request_id")->nullable($value=true);
            $table->foreign('request_id')->references('id')->on("requests")->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}
