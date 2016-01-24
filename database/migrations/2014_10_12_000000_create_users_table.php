<?php

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
            $table->string('email')->unique();
            $table->string('displayName');
            $table->string('firstName');
            $table->string('lastName')->nullable();
            $table->string('photo');
            $table->enum('source', ['facebook', 'google', 'internal'])->default('internal');
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->string('password', 60);
            $table->boolean('status')->default(1);
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
        Schema::drop('users');
    }
}
