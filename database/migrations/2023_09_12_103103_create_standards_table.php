<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStandardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });   

        Schema::create('boards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('state_id');
            $table->timestamps();
            $table->foreign('state_id')->references('id')->on('states');
        });

        Schema::create('mediums', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('board_id');
            $table->timestamps();
            $table->foreign('board_id')->references('id')->on('boards');
        });

        Schema::create('standards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('medium_id');
            $table->timestamps();
            $table->foreign('medium_id')->references('id')->on('mediums');
        });

        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('standard_id');
            $table->timestamps();
            $table->foreign('standard_id')->references('id')->on('standards');
        });

        Schema::create('chapters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('subject_id');
            $table->timestamps();
            $table->foreign('subject_id')->references('id')->on('subjects');
        });

        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->text('body');
            $table->unsignedBigInteger('chapter_id');
            $table->timestamps();
            $table->foreign('chapter_id')->references('id')->on('chapters');
        });

        Schema::create('subtopics', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->text('body');
            $table->unsignedBigInteger('topic_id');
            $table->timestamps();
            $table->foreign('topic_id')->references('id')->on('topics');
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('standards');
    }
}
