<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->string('title')->nullable();
            $table->string('user_id')->nullable();
            $table->string('location')->nullable();
            $table->string('description')->nullable();
            $table->string('phone')->nullable();
            $table->string('date')->nullable();
            $table->string('client_name')->nullable(); 
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
        Schema::dropIfExists('tasks');
    }
}
