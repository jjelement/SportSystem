<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('event_id');
            $table->string('deliveryMethod');
            $table->decimal('price');
            $table->unsignedBigInteger('district_id')->nullable();
            $table->text('address')->nullable();
            $table->string('qrCodeTransactionId')->nullable();
            $table->string('creditCardTransactionId')->nullable();
            $table->string('paymentMethod')->nullable();
            $table->dateTime('paymentDatetime')->nullable();
            $table->string('paymentStatus')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('event_id')
                ->references('id')->on('events')
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
        Schema::dropIfExists('tickets');
    }
}
