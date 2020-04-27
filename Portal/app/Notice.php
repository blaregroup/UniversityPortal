<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/*

	notification::insert(['user_id'=>'1', 'message'=>'yp']);

*/

class Notice extends Model
{


	protected $fillable = [
		'message', 
		'user_id'
	];

    public function User(){
    	return $this->belongsTo('App\User');
    }

}
