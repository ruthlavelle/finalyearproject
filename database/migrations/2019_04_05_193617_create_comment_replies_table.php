<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentRepliesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('comment_replies', function (Blueprint $table) {
            $table->increments('id');
            $table->text('body');

            //Stores the id of the logged in user
            $table->string('author');

            //Stores the id of the comment this reply is made about
            $table->integer('comment_id')->length(10)->unsigned();
            $table->timestamps();

            //If the comment this reply is associated with deletes
            //Delete all replies
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comment_replies');
    }
}
