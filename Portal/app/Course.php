<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
	protected $fillable = [
		'name',
		'Description'
	];



	public function subject(){
		return $this->hasMany('App\Subject');
	}

	public function role(){
		return $this->hasMany('App\Roles');
	}

	public function create_subject($subject_code, $subject_name, $subject_description){
		return Subject::create([
			'subcode'=>$subject_code, 
    		'name'=>$subject_name,
    		'description'=>$subject_description, 
    		'course_id'=>$this->id,
    	]);
		
	}

}
