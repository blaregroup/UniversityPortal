<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    //
       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role', 'active', 'access', 'user_id','course_id','subject_id'
    ];

    public function User(){
    	return $this->belongsTo('App\User');
    }

    
    public function course(){
        return $this->belongsTo('App\Course');
    }

    public function subject(){
        return $this->belongsTo('App\Subject');
    }


    public function join_course($id){
        $this->course_id=$id;
        return $this->save();
    }

    public function join_subject($id){
        $this->subject_id = $id;
        return $this->save();

    }



}
