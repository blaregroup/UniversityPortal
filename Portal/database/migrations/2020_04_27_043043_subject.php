<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



/*
Table Name : Subject
Columns name : code, name, description, teacher
*/
class Subject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('subjects', function(Blueprint $table){
            $table->id();
            $table->integer('subcode'); // subject code
            $table->string('name');
            $table->longText('description');
            $table->bigInteger('course_id')->nullable()->unsigned();
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
        //
       Schema::dropIfExists('subjects');
    }
}
