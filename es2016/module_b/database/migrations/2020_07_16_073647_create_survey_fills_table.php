<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyFillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_fills', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('ip_address');
            $table->integer('employee_id')->nullable();
            $table->foreignId('survey_id')->constrained()->onDelete('cascade');

            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_fills');
    }
}
