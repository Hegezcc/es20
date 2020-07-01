<?php

use App\Day;
use App\DiningExperience;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDiningOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dining_options', function (Blueprint $table) {
            $table->id();
            $table->string('time');
            $table->unsignedBigInteger('guest_count');
            $table->unsignedBigInteger('competitor_count')->default(6);
            $table->unsignedBigInteger('dining_experience_id');
            $table->unsignedBigInteger('day_id');

            $table->foreign('dining_experience_id')->references('id')->on('dining_experiences');
            $table->foreign('day_id')->references('id')->on('days');
        });

        $experiences = DiningExperience::get(['id', 'name']);
        $days = Day::all();

        $options = [];

        foreach ($experiences as $exp) {
            $times = [];
            switch ($exp->name) {
                case 'Casual Dining':
                    $times['10:50 - 12:00'] = 4;
                    $times['13:30 - 14:40'] = 2;
                    break;

                case 'Bar Service':
                    $times['13:15 - 14:45'] = 6;
                    break;

                case 'Fine Dining':
                    $times['13:00 - 15:15'] = 4;
                    break;
                default:
                case 'Banquet Dining':
                    $times['12:45 - 15:00'] = 6;
                    break;
            }

            foreach ($days as $day) {
                foreach ($times as $time => $guest_count) {
                    $options[] = [
                        'time' => $time,
                        'guest_count' => $guest_count,
                        'dining_experience_id' => $exp->id,
                        'day_id' => $day->id,
                    ];
                }
            }
        }

        DB::table('dining_options')->insert($options);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dining_options');
    }
}
