<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrientationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orientations', function (Blueprint $table) {
            $table->engine = "InnoDB"; 
            $table->string('pupil_id', 10)->index();
            $table->foreign('pupil_id')->references('dni')->on('pupils')->onDelete('cascade')->primary();
            $table->string('counselor_id', 10)->index();
            $table->foreign('counselor_id')->references('dni')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orientations');
    }
}