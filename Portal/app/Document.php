<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Document extends Model
{
    //
    protected $fillable = [
    	'name',
    	'Description',
    	'originalname',
    	'hashname',
    	'user_id'
    ];


	public function user()
    {
    	# code...
    	return $this->belongsTo('App\User');
    }

}
