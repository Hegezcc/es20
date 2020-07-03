<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seatings', function (Blueprint $table) {
            $table->foreign('experience_id')->references('id')->on('experiences');
        });

        Schema::table('options', function (Blueprint $table) {
            $table->foreign('seating_id')->references('id')->on('seatings');
            $table->foreign('day_id')->references('id')->on('days');
        });

        Schema::table('guests', function (Blueprint $table) {
            $table->foreign('option_id')->references('id')->on('options');
            $table->foreign('reservation_id')->references('id')->on('reservations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seatings', function (Blueprint $table) {
            $table->dropForeign('experience_id');
        });

        Schema::table('options', function (Blueprint $table) {
            $table->dropForeign('seating_id');
            $table->dropForeign('day_id');
        });

        Schema::table('guests', function (Blueprint $table) {
            $table->dropForeign('option_id');
            $table->dropForeign('reservation_id');
        });
    }
}
