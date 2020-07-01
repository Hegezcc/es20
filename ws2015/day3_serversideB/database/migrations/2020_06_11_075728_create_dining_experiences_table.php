<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDiningExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dining_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description');
        });

        DB::table('dining_experiences')->insert(
            [
                [
                    'name' => 'Casual Dining',
                    'description' => 'This dining is like a bistro/café.'
                ],
                [
                    'name' => 'Bar Service',
                    'description' => 'Casual service for sandwiches, cakes, cheese plates, salads, alcoholic and non-alcoholic beverages. Guests can choose from a limited menu. Competitors will prepare international cocktails and serve with light snacks.'
                ],
                [
                    'name' => 'Fine Dining',
                    'description' => 'This is formal dining with a four course set menu with alcoholic beverages. The service includes the waiter preparing all dishes at the table by flambé, carving or assembling. Appropriate for VIPs.'
                ],
                [
                    'name' => 'Banquet Dining',
                    'description' => 'This is a three course set menu with coffee and alcoholic beverages in a banquet format.'
                ]
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dining_experiences');
    }
}
