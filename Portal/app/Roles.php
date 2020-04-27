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
        'role', 'active', 'access', 'user_id'
    ];

    public function User(){
    	return $this->belongsTo('App\User');
    }

}
