<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/*

Table name  : profiles
Column name : user_id, fname, description, gender, dob, mother_name, father_name, phone, mphone, fphone, alphone 

*/



class Profile extends Model
{
    //

    protected $fillable = [
        'user_id',
        'fname', 
        'description', 
        'mothername',
        'fathername',
        'phone',
        'mphone',
        'fphone',
        'alphone',
        'document_id',
        'gender',
        'dob'
    ];


    

    // 
    public function user(){
    	return $this->belongsTo('App\User');

    }

}
