<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id')->length(10)->unsigned();
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
            $table->string('project_manager');
            $table->integer('user_id')->unsigned()->index();
            $table->date('closure_date')->index();
            $table->integer('approval_status')->index()->default(0);
            $table->longText('update');

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
