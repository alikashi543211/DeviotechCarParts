<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ImagesRule implements Rule
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
        $result=true;
        foreach($value as $file)
        {
            $ext=$file->getClientOriginalExtension();

            if($ext=='mp4' || $ext=='jpeg' || $ext=='jpg' || $ext=='png')
            {

            }else
            {
                $result=false;
            }
        }
        return $result;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You can upload files in these extensions mp4 , jpeg , jpg , png';
    }
}
