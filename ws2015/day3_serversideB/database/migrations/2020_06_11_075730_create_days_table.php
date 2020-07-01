<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('days', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('date');
        });

        DB::table('days')->insert([
            ['name' => 'C1', 'date' => '2015-08-04'],
            ['name' => 'C2', 'date' => '2015-08-05'],
            ['name' => 'C3', 'date' => '2015-08-06'],
            ['name' => 'C4', 'date' => '2015-08-07'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('days');
    }
}
