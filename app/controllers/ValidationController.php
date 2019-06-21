<?php 

namespace App\Controllers;

use App\Models\FormProcessing\FormValidator;
use App\Core\Request;

class ValidationController
{
    public static function validate()
    {
        // Clean request data from white spaces at the edges
        $_POST = array_map('trim', $_POST);

        return (self::checkEmptyFields() || self::checkTextFields() ||
            self::checkEmail() || self::checkPhoneNumber() ||
            self::checkPassword() || self::checkStreetNumber()) ? 0 : 1;
    }

    public static function checkEmptyFields()
    {
        if (FormValidator::areAllFieldsEmpty($_POST)) {
            return view(Request::uri(), 'Please, fill all the fields.');
        }
    }

    public static function checkTextFields()
    {
        $textField = FormValidator::validateAllTextFields($_POST);

        if ($textField !== 1) {
            return view(Request::uri(), $_POST, "$textField is not valid");
        }
    }

    private static function checkEmail()
    {
        if (! FormValidator::validateEmail($_POST['email'])) {
            return view(Request::uri(), $_POST, 'email is not valid');
        }
    }

    private static function checkPhoneNumber()
    {
        if (! FormValidator::validatePhoneNumber($_POST['phone_number'], 11)) {
            return view(Request::uri(), $_POST, 'phone number is not valid');
        }
    }
    
    private static function checkPassword()
    {
        if (! FormValidator::validatePassword($_POST['password'])) {
            return view(Request::uri(), $_POST, 'password is not valid');
        }
    }

    private static function checkStreetNumber()
    {
        if (! FormValidator::validateStreetNumber($_POST['street_number'])) {
            return view(Request::uri(), $_POST, 'street number is not valid');
        }
    }
}