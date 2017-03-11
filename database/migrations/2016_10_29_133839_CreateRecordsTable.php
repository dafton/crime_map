<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crime_records', function (Blueprint $table) {
            $table->increments('id');
            $table->text('crime_type');
            $table->integer('marker_id');
            $table->string('marker_color');
            $table->text('area_committed');
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->text('offender_name');
            $table->text('offender_id');
            $table->dateTime('time_committed');
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
        Schema::drop('crime_records');
    }
}
