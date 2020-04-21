<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //

    protected $fillable = [
        'fname', 
        'description', 
        'gender',
        'dob', 
        'mother_name',
        'father_name',
        'phone',
        'mphone',
        'fphone',
        'alphone'
    ];



    // one to one relation to user
    // protected $primaryKey = 'profile_id';

    public function user(){
    	return $this->belongsTo('App\User', 'id');

    }
}
