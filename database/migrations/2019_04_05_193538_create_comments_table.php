<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('body');

            //Stores the id of the logged in user
            $table->string('author');

            //Stores the id of the project this comment is left on
            $table->integer('project_id')->length(10)->unsigned();
            $table->timestamps();

            //Deletes all comments associated with a project if the project
            // is deleted
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
    }
}
