<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('profileImage');
            $table->string('name');
            $table->string('description');
            $table->text('content');
            $table->integer('maxParticipants')->nullable();
            $table->dateTime('startRegisterDate');
            $table->dateTime('endRegisterDate')->nullable();
            $table->dateTime('startDate');
            $table->dateTime('endDate')->nullable();
            $table->boolean('isFeature');
            $table->boolean('canWalkIn');
            $table->text('shirtType')->nullable();
            $table->text('shirtSize')->nullable();
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
        Schema::dropIfExists('events');
    }
}
