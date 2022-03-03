<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id');
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();

            $table
                ->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        $cities = [
            ['country_id' => 1, 'name' => 'Colombo'],
            ['country_id' => 1, 'name' => 'Nugegoda'],
            ['country_id' => 1, 'name' => 'Gampaha'],
            ['country_id' => 2, 'name' => 'Mumbai'],
            ['country_id' => 2, 'name' => 'Delhi'],
        ];

        foreach ($cities as $city) {
            DB::table('cities')->insert($city);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
