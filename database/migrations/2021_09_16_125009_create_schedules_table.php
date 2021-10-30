<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->softDeletes();

            $table->bigIncrements('id');
            $table->bigInteger('hospital_id')->unsigned();;
            $table->foreign('hospital_id')->references('id')->on('hospitals')->onDelete('cascade');
            $table->string('NumOfAvailable');
            $table->bigInteger('expire')->default(0);

            $table->string('day');
            $table->date('date');	//here is date
            $table->time('time');	//here is time


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
        Schema::dropIfExists('schedules');
    }
}
