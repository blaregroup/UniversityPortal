<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class rolecheck implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // in lowercase
        if (strtolower($value)=== $value){
            // ['teacher', 'admin', 'student']
            if ($value==="admin"){
                
                return true;

            }elseif($value==="teacher"){
                
                return true;

            }elseif($value==="student"){
                
                return true;
            
            
            }else{
                return false;
            }

        }else{
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Role Check Validation Fail';
    }
}
