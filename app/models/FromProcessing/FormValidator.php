<?php 

namespace App\Models\FormProcessing;

class FormValidator
{
    public static function isFieldEmpty($request)
    {
        foreach($request as $field => $value)
        {
            if(empty($value))
                return true;
        }
        return false;
    }

    public static function validateTextualField($field)
    {
        if(preg_match('/[\'^£$%&*()}{.!@#~?><>,|=_+¬-]/', $field) || preg_match('/^[0-9]+$/', $field))
            return 0;

        return 1;
    }

    public static function validateEmail($email)
    {
        if(!strrchr($email, '@') || !strrchr($email, '.'))
            return 0;
        return 1;
    }
}

