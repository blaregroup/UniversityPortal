<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            /*
            * Role Of User, Decided What user can do, 
            *
            * A For Admin
            * T For Teacher
            * S For Student
            * But Keep in Mind.. I will never let you registered as Admin From Web Login
            * For Admin Account, You have to run.. Admin Registration application from backend.
            * !! Got That !! :)) 
            */ 
            $table->enum('role', ['T', 'A', 'S'])->default('S');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
