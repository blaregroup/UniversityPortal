<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*

Table name  : profiles
Column name : user_id, fname, description, gender, dob, mother_name, father_name, phone, mphone, fphone, alphone 

*/

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('pic')->nullable();
            $table->string('fname');                    // fullname
            $table->longText('description');            // description
            $table->enum('gender', ['male', 'female'])->nullable(); // gender
            $table->date('dob')->nullable();                        // date of birth
            $table->string('mother_name')->nullable();              // mother name
            $table->string('father_name')->nullable();              // father name

            $table->char('phone', 10)->nullable();                  // personal number
            $table->char('mphone', 10)->nullable();     // mother number
            $table->char('fphone', 10)->nullable();     // father number
            $table->char('alphone', 10)->nullable();    // alternate numbers

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
        Schema::dropIfExists('profiles');
    }
}
