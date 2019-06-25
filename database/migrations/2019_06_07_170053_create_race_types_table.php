<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRaceTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('race_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('event_id');
            $table->string('name');
            $table->decimal('price');
            $table->integer('maxParticipants')->nullable();
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
        Schema::dropIfExists('race_types');
    }
}
