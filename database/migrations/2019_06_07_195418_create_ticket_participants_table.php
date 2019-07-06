<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_participants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ticket_id');
            $table->unsignedBigInteger('race_type_id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email');
            $table->string('tel');
            $table->string('passportNo')->nullable();
            $table->enum('gender', ['M', 'F']);
            $table->date('birthdate');
            $table->string('healthIssue')->nullable();
            $table->string('bloodType');
            $table->string('contactName')->nullable();
            $table->string('contactRelationship')->nullable();
            $table->string('contactPhoneNumber')->nullable();
            $table->string('shirtType')->nullable();
            $table->string('shirtSize')->nullable();
            $table->timestamps();

            $table->foreign('race_type_id')
                ->references('id')->on('race_types')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('ticket_id')
                ->references('id')->on('tickets')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_participants');
    }
}
