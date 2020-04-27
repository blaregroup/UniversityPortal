<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*

Table Name  : messages
Column Name : sender_id, receiver_id, text


*/

class Message extends Model
{
    //
    eprotected $fillable = [
    	'sender_id',
    	'receiver_id',
    	'text'
    ];


}
