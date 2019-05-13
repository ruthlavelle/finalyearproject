<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            //ID of role from the roles table
            //Must be a positive number but can be null
            $table->integer('role_id')->defuault(2)->index()->unsigned()->nullable();
            //Specifies if the user is active
            //Defaults to 1 when user is created, making the active
            $table->integer('is_active')->default(1);
            $table->string('name');
            //Email must be unique
            $table->string('email')->unique();
            $table->string('password');
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
