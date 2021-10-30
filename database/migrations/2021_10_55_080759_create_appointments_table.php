<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');

                $table->unsignedBigInteger('user_id')->nullable()->unsigned();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->unsignedBigInteger('hospital_id')->nullable()->unsigned();
             $table->foreign('hospital_id')->references('id')->on('hospitals')->nullOnDelete();
             $table->unsignedBigInteger('schedules_id')->nullable()->unsigned();
            $table->foreign('schedules_id')->references('id')->on('schedules')->nullOnDelete();
            $table->integer('status')->default(2);
            $table->integer('takeVaccine')->default(0);
                $table->text('qrcode')->nullable();
                $table->unsignedBigInteger('vaccine_id')->nullable()->unsigned();
                $table->foreign('vaccine_id')->references('id')->on('vaccines')->onDelete('cascade');

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
        Schema::dropIfExists('appointments');
    }
}
