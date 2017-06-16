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
            $table->increments('id');
            $table->string('username');
            $table->string('slug');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('job')->nullable();
            $table->longText('avatar')->nullable();
            $table->string('city')->nullable();
            $table->boolean('status', '0');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('fb')->nullable();
            $table->string('tw')->nullable();
            $table->string('ln')->nullable();
            $table->string('viadeo')->nullable();
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
