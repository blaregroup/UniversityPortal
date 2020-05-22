<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Document extends Model
{
    //
    protected $fillable = [
    	'name',
    	'description',
    	'originalname',
    	'hashname',
    	'user_id',
        'type'
    ];


	public function user()
    {
    	# code...
    	return $this->belongsTo('App\User');
    }

}
