<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_accesses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('survey_id')->constrained()->cascadeOnDelete();
            $table->integer('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_accesses');
    }
}
