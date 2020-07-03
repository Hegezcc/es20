<?php

use App\Day;
use App\Experience;
use App\Seating;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InsertDefaultData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('days')->insert([
            ['name' => 'C1', 'date' => '2015-08-04'],
            ['name' => 'C2', 'date' => '2015-08-05'],
            ['name' => 'C3', 'date' => '2015-08-06'],
            ['name' => 'C4', 'date' => '2015-08-07'],
        ]);

        $experiences = [
            ['experience' => ['name' => 'Casual Dining', 'tables' => collect([2,4]), 'description' => 'This dining is like a bistro/café.'], 'seatings' => [['time' => '10:50 – 12:00'], ['time' => '13:30 – 14:40'],]],
            ['experience' => ['name' => 'Bar Service', 'tables' => collect([6]), 'description' => 'Casual service for sandwiches, cakes, cheese plates, salads, alcoholic and non-alcoholic beverages. Guests can choose from a limited menu. Competitors will prepare international cocktails and serve with light snacks.'], 'seatings' => [['time' => '13:15 – 14:45'],]],
            ['experience' => ['name' => 'Fine Dining', 'tables' => collect([4]), 'description' => 'This is formal dining with a four course set menu with alcoholic beverages. The service includes the waiter preparing all dishes at the table by flambé, carving or assembling. Appropriate for VIPs.'], 'seatings' => [['time' => '13:00 – 15:15'],]],
            ['experience' => ['name' => 'Banquet Dining', 'tables' => collect([6]), 'description' => 'This is a three course set menu with coffee and alcoholic beverages in a banquet format.'], 'seatings' => [['time' => '12:45 – 15:00'],]],
        ];

        foreach ($experiences as $exp) {
            $model = new Experience($exp['experience']);
            $model->save();

            foreach($exp['seatings'] as $seating) {
                Seating::insert(array_merge($seating, ['experience_id' => $model->id]));
            }
        }

        $options = [];

        foreach (Seating::pluck('id') as $seating) {
            foreach (Day::pluck('id') as $day) {
                $options[] = ['day_id' => $day, 'seating_id' => $seating];
            }
        }

        DB::table('options')->insert($options);

        DB::table('competitors')->insert(['count' => 6]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
