<?php

namespace App;
use DB;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /*
    
    To create new profile

    */
    public function createProfile(
        $fname="FULLNAME", 
        $description="", 
        $gender="male",
        $dob="01/01/1999", 
        $mother_name="",
        $father_name="",
        $phone="",
        $mphone="",
        $fphone="",
        $alphone=""
        ){
        /*
        Table name  : profiles
        Column name : user_id, fname, description, gender, dob, mother_name, father_name, phone, mphone, fphone, alphone 
        */

        if($this->Profile()->first()==null){

            $obj = Profile::create([
                'user_id'=>$this->id,
                'fname'=>$fname,
                'description'=>$description,
                'gender'=>$gender,
                'dob'=>$dob,
                'mothername'=>$mother_name,
                'fathername'=>$father_name,
                'phone'=>$phone,
                'mphone'=>$mphone,
                'fphone'=>$fphone,
                'alphone'=>$alphone

            ]);        
            
            return $obj;
        }else{

            return false;
        }
    }

    /*
    Get profile table
    */ 
    public function Profile(){    
        return $this->hasOne('App\Profile');
    }

    /* 
    Create Notice records
    @param string $message

    */
    public function createNotification($title, $message){
        
        /*

            Notice::insert(['user_id'=>'1', 'message'=>'yp']);

        */


        $obj = new Notice;
        $obj->title=$title;
        $obj->user_id=$this->id;
        $obj->message=$message;
        $obj->save();    

        return $obj;
    }

   

    /*
    Get notification table
    
    @return Notice model object
    */
    public function Notice(){
        return $this->hasMany('App\Notice');
    }

    /*
    Delete notification 

    @param string $id -> notification message id

    @return notification
    */
    public function removeNotification($id){
        $n = Notice::find($id);

        if($n){
            return $n->delete();
        }
        return false;

    }

    /*

    Function To create new role  
    @param string $student ["student", "admin", "teacher"]
    @param string $access ["low", "median", "high"]
    @param string @active ["0", "1"]

    */
    public function createRole($role="student", $access="low", $active="0"){

    /* 
        Role table schema
        Table Name : role
        Column Name : role, access, active, user_id

    */

        if($this->Role()->first()==null){

            $obj = new Roles;

            $obj->role=$role;
            $obj->access=$access;
            $obj->active=$active;
            $obj->notice_chk='1';
            $obj->user_id=$this->id;
            $obj->save();

            return $obj;
        }else{
            return false;
        }
    }


    /*
     Get user role model object

     @return role object
    */
    public function Role(){
        $role = $this->hasOne('App\Roles');
        if($role==null){
            return $this->createRole();
        }else{
            return $role;
        }
    }

    /* 
    activate user account
     */
    public function activate(){
        $role = $this->Role()->first();
        $role->active="1";
        return $role->save();
    }

    /*
    Deactivate user account
    */
    public function deactivate(){
        $role = $this->Role()->first();
        $role->active="0";
        return $role->save();
    }


    /*
    User account active status
    
    @return boolean
    */
    public function getactive(){
        if ($this->Role()->first()==null) {
            # code...
            return false;
        }else{
            if($this->Role()->first()->active=="1"){
                return true;
            }else{
                return false;
            }

        }

    }

    /*
    Return user role 

    @return string ["student", "teacher", "admin"]
    */
    public function getrole(){
        return $this->Role()->first()->role;
    }

    /*
    Returns the access type of User

    @return string ["low", 'mediam', 'high']
    */
    public function getaccess(){
        if($this->getactive()){
            return $this->Role()->first()->access;
        }else{
            return false;
        }
    }



    /*
    Create message record

    @param string $sendto -> User ID Foreign Key
    @param string $message -> Text message

    @return Message Object
    */
    public function message($sendto, $message){
        return Message::create([
            'sender_id'=>$this->id,
            'receiver_id'=>$sendto,
            'text'=>$message
        ]);
    }



    public function messages($sendto){
        return Message::where('sender_id',$this->id)->get();
    }



    public function upload($name, $description, $originalname, $pathname){
        
        
        return Document::create([
            'name'=> $name, 
            'Description'=>$description, 
            'originalname'=>$originalname, 
            'hashname'=>$pathname, 
            'user_id'=>$this->id
        ]);
    }


    public function uploads(){
        return $this->hasMany('App\Document');
    }


}

