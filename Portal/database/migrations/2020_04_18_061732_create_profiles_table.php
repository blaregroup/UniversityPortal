<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('fname');        // fullname
            $table->longText('description');  // description
            $table->enum('gender', ['male', 'female']); // gender
            //$table->date('dob');            // date of birth
            $table->string('mother_name');  // mother name
            $table->string('father_name');  // father name

            // phone, mphone, fphone
            $table->char('phone', 10);  // personal number
            $table->char('mphone', 10)->nullable(); // mother number
            $table->char('fphone', 10)->nullable(); // father number
            $table->char('alphone', 10)->nullable(); // alternate numbers


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
