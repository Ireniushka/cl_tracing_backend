<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->engine = "InnoDB"; 
            $table->bigIncrements('id', 11);
            $table->string('name', 50);
            $table->string('url', 100)->nullable();
            $table->enum('url_type', ['web','file','nothing'])->default('nothing');
            $table->text('enunciation')->nullable();
            $table->text('description')->nullable();
            $table->text('materials')->nullable();
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
        Schema::dropIfExists('activities');
    }
}
