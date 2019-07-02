<?php 

namespace App\Models\FormProcessing;

class FormValidator
{
    public static function areAllFieldsEmpty($request)
    {
        foreach($request as $field => $value)
        {
            if (empty($value)) { 
                return true;
            }
        }
        return false;
    }


    public static function validateAllTextFields($request)
    {
        $textFields = $request;
        $textFields = self::getTextFields($textFields);

        foreach($textFields as $field => $value)
        {
            if (! self::isTextFieldValid($value)) {
                return $field;
            }
        }
        return 1;
    }

    private static function getTextFields($request)
    {
        unset($request['email'], $request['phone_number'], $request['password'], $request['street_number']);
        return $request;
    }
    private static function isTextFieldValid($field)
    {
        return (
            preg_match('/[\'^£$%&*()}{!@#~?><>,|=_+¬-]/', $field)) ? 0 : 1;            
    }

    public static function validateEmail($email)
    {
        return (!filter_var($email, FILTER_VALIDATE_EMAIL)) ? 0 : 1;
    }

    public static function validatePhoneNumber($phoneNumber, $phoneLength)
    {
        return  (strlen($phoneNumber) < $phoneLength || !is_numeric($phoneNumber)) ? 0 : 1;
    }

    public static function validatePassword($password)
    {
        return (
            self::checkPasswordLength($password, 7) &&
            preg_match("#[0-9]+#", $password) &&
            preg_match("#[a-z]+#", $password) &&
            preg_match("#[A-Z]+#", $password)
        );
    }

    private static function checkPasswordLength($password)
    {
        $minimumPasswordLength = 7;
        return (strlen($password) > $minimumPasswordLength) ? true : false;
    }

    public static function validateStreetNumber($streetNumber)
    {
        return is_numeric($streetNumber);
    }
}

