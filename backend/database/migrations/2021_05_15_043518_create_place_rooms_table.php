<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaceRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('build_id');
            $table->string('name', 50);
            $table->timestamps();

            $table->foreign('build_id')->references('id')->on('place_builds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('place_rooms');
    }
}
