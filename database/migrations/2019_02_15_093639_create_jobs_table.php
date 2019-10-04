<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_id');
            $table->string('title');
            $table->string('position');
            $table->text('description');
            $table->string('experience');
            $table->string('deadline_date');
            $table->string('date_posted');
            $table->string('job_type');
            $table->string('location');
            $table->string('salary');
            $table->string('comp_name');
            $table->string('comp_desc');
            $table->string('show')->default(true);
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
        Schema::dropIfExists('jobs');
    }
}
