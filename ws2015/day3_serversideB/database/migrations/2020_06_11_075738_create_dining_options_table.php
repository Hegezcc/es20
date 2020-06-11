<?php

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
            $table->string('day_name');
            $table->date('date');
            $table->string('time');
            $table->unsignedBigInteger('dining_experience_id');

            $table->foreign('dining_experience_id')->references('id')->on('dining_experiences');
        });

        $experiences = DiningExperience::get(['id', 'name']);

        $options = [];
        $days = [
            'C1' => '2015-08-04',
            'C2' => '2015-08-05',
            'C3' => '2015-08-06',
            'C4' => '2015-08-07',
        ];

        foreach ($experiences as $exp) {
            $times = [];
            switch ($exp->name) {
                case 'Casual Dining':
                    $times[] = '10:50 - 12:00';
                    $times[] = '13:30 - 14:40';
                    break;

                case 'Bar Service':
                    $times[] = '13:15 - 14:45';
                    break;

                case 'Fine Dining':
                    $times[] = '13:00 - 15:15';
                    break;
                default:
                case 'Banquet Dining':
                    $times[] = '12:45 - 15:00';
                    break;
            }

            foreach ($days as $day_name => $date) {
                foreach ($times as $time) {
                    $options[] = [
                        'day_name' => $day_name,
                        'date' => $date,
                        'time' => $time,
                        'dining_experience_id' => $exp->id
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
