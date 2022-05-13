<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackingTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracking_tests', function (Blueprint $table) {
            $table->engine = "InnoDB"; 
            $table->bigIncrements('id', 11);
            $table->unsignedInteger('pupil_id')->index();
            $table->foreign('pupil_id')->references('id')->on('pupils')->onDelete('cascade');
            $table->tinyInteger('lat_cruzada')->default(1);
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
        Schema::dropIfExists('tracking_tests');
    }
}
