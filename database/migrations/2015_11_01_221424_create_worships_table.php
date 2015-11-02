<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worships', function (Blueprint $table) {
            $table->bigInteger('church_id')->unsigned();
            $table->timestamp('start');
            $table->timestamp('end')->nullable();
            $table->enum('days', ['EveryDay', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'EverySunday', 'EveryMonday', 'EveryTuesday', 'EveryWednesday', 'EveryThursday', 'EveryFriday', 'EverySaturday'])->nullable()->default('EverySunday');
            $table->boolean('status')->default(false);

            $table->foreign('church_id')->references('id')->on('churches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('worships');
    }
}
