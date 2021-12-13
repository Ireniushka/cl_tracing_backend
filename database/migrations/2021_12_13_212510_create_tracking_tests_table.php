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
            $table->string('pupil_id')->index();
            $table->foreign('pupil_id')->references('dni')->on('pupils')->onDelete('cascade');
            $table->enum('result', ['DDDD','IIII','DIDI']);
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
