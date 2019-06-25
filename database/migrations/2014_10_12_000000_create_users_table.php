<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->string('password');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('passportNo')->nullable();
            $table->string('email');
            $table->string('tel');
            $table->string('tel2')->nullable();
            $table->enum('gender', ['M', 'F']);
            $table->string('healthIssue')->nullable();
            $table->string('bloodType');
            $table->string('province');
            $table->string('area');
            $table->string('district');
            $table->string('postalCode');
            $table->text('address');
            $table->date('birthdate');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
