<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutelagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutelages', function (Blueprint $table) {
            $table->engine = "InnoDB"; 
            $table->string('pupil_id', 10)->index();
            $table->foreign('pupil_id')->references('dni')->on('pupils')->onDelete('cascade')->primary();
            $table->string('legal_tutor_id', 10)->index();
            $table->foreign('legal_tutor_id')->references('dni')->on('users')->onDelete('cascade')->primary(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tutelages');
    }
}
