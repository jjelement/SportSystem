<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('name');
            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('geography_id');

            $table->foreign('area_id')
                ->references('id')->on('areas')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('province_id')
                ->references('id')->on('provinces')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('geography_id')
                ->references('id')->on('geographies')
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
        Schema::dropIfExists('districts');
    }
}
