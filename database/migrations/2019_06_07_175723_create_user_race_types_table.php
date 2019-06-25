<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRaceTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_race_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('userId');
            $table->unsignedInteger('raceTypeId');
            $table->string('shirt_type')->nullable();
            $table->string('shirt_size')->nullable();
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
        Schema::dropIfExists('user_race_types');
    }
}
