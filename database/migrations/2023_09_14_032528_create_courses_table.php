<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('standard_id')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->integer('count');
            $table->boolean('status');
            $table->timestamps();
            $table->foreign('standard_id')->references('id')->on('standards');
            $table->foreign('subject_id')->references('id')->on('subjects');
        });

        Schema::create('activations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('activation_key');
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('user_id')->references('id')->on('users');
            // Add any other foreign keys as needed, e.g., for user_id
        });

    }

    public function down()
    {
        Schema::dropIfExists('courses');
        Schema::dropIfExists('activations');
    }
}
