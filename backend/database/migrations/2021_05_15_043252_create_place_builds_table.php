<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaceBuildsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_builds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('area_id');
            $table->string('name', 50);
            $table->timestamps();

            $table->foreign('area_id')->references('id')->on('place_areas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('place_builds');
    }
}
