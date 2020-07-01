<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('country');
            $table->string('status')->default('requested');
            $table->unsignedBigInteger('reservation_id');
            $table->unsignedBigInteger('dining_option_id');

            $table->foreign('reservation_id')->references('id')->on('reservations');
            $table->foreign('dining_option_id')->references('id')->on('dining_options');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guests');
    }
}
