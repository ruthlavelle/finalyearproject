<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('description');
            $table->longText('benefits');
            $table->float('cost', 10, 2)->unsigned();
            $table->float('ROI', 10, 2)->unsigned();
            $table->float('spend', 10, 2)->unsigned();
            $table->date('due_date')->index();
            $table->integer('driver_id')->index();
            $table->integer('department_id')->index();
            $table->integer('RAG_id')->index();
            $table->integer('status_id')->index();
            $table->integer('PM_id')->index();
            $table->integer('user_id')->index()->nullable()->unsigned();
            $table->integer('IT_team_id')->index();
            $table->integer('priority_id')->index();
            $table->date('closure_date')->index();

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
        Schema::drop('projects');
    }
}
