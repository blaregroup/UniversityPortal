<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    // one to one relation to user
    // protected $primaryKey = 'profile_id';

    public function user(){
    	return $this->belongsTo('App\User', 'id');

    //}
}
