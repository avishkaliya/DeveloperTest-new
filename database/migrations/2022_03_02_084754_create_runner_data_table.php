<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRunnerDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('runner_data', function (Blueprint $table) {
            $table->id();
            $table->string('runner_name');
            $table->unsignedBigInteger('radius');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->unsignedBigInteger('number_of_laps');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('runner_data');
    }
}
