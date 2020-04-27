<?php

namespace App;

use Illuminate\Database\Eloquent\Model;




/*
	Table Name : Subject
	Columns name : code, name, description, teacher
*/

class Subject extends Model
{
    //
    protected $fillable = [
    	'code', 
    	'name',
    	'description', 
    	'teacher'];

}
