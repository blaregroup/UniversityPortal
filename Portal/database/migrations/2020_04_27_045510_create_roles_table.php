<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



/* 

Table Name : role
Column Name : role, access, active, user_id
*/
class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role');
            $table->string('access');
            $table->Integer('active');
            $table->string('enroll')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('course_id')->nullable()->unsigned();
            $table->foreign('course_id')->nullable()->references('id')->on('courses');
            //$table->bigInteger('subject_id')->nullable()->unsigned();
            //$table->foreign('subject_id')->nullable()->references('id')->on('subjects');

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
        Schema::dropIfExists('roles');
    }
}
