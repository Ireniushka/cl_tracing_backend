<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackingActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracking_activities', function (Blueprint $table) {
            $table->engine = "InnoDB"; 
            $table->increments('id', 11);
            $table->unsignedInteger('pupil_id')->index();
            $table->foreign('pupil_id')->references('id')->on('pupils')->onDelete('cascade');
            $table->unsignedInteger('activity_id')->index();
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->text('comment');
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
        Schema::dropIfExists('tracking_activities');
    }
}
