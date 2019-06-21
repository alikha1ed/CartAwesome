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
            return toViewWithError(Request::uri(), 'Please, fill all the fields.', $_POST);
        }
    }

    public static function checkTextFields()
    {
        $textField = FormValidator::validateAllTextFields($_POST);

        if ($textField !== 1) {
            return toViewWithError(Request::uri(), "$textField is not valid", $_POST);
        }
    }

    private static function checkEmail()
    {
        if (! FormValidator::validateEmail($_POST['email'])) {
            return toViewWithError(Request::uri(), 'email is not valid', $_POST);
        }
    }

    private static function checkPhoneNumber()
    {
        if (! FormValidator::validatePhoneNumber($_POST['phone_number'], 11)) {
            return toViewWithError(Request::uri(), 'phone number is not valid', $_POST);
        }
    }
    
    private static function checkPassword()
    {
        if (! FormValidator::validatePassword($_POST['password'])) {
            return toViewWithError(Request::uri(), 'password is not valid', $_POST);
        }
    }

    private static function checkStreetNumber()
    {
        if (! FormValidator::validateStreetNumber($_POST['street_number'])) {
            return toViewWithError(Request::uri(), 'street number is not valid', $_POST);
        }
    }
}