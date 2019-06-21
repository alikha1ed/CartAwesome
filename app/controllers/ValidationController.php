<?php 

namespace App\Controllers;

use App\Models\FormProcessing\FormValidator;

class ValidationController
{
    public static function validate()
    {
        // Clean request data from white spaces at the edges
        $_POST = array_map('trim', $_POST);

        return (self::checkEmptyFields('register') || self::checkTextFields('register') ||
            self::checkEmail() || self::checkPhoneNumber() ||
            self::checkPassword() || self::checkStreetNumber()) ? 0 : 1;
    }

    public static function checkEmptyFields($view)
    {
        if (FormValidator::areAllFieldsEmpty($_POST)) {
            return toViewWithError($view, 'Please, fill all the fields.', $_POST);
        }
    }

    public static function checkTextFields($view)
    {
        $textField = FormValidator::validateAllTextFields($_POST);

        if ($textField !== 1) {
            return toViewWithError($view, "$textField is not valid", $_POST);
        }
    }

    private static function checkEmail()
    {
        if (! FormValidator::validateEmail($_POST['email'])) {
            return toViewWithError('register', 'email is not valid', $_POST);
        }
    }

    private static function checkPhoneNumber()
    {
        if (! FormValidator::validatePhoneNumber($_POST['phone_number'], 11)) {
            return toViewWithError('register', 'phone number is not valid', $_POST);
        }
    }
    
    private static function checkPassword()
    {
        if (! FormValidator::validatePassword($_POST['password'])) {
            return toViewWithError('register', 'password is not valid', $_POST);
        }
    }

    private static function checkStreetNumber()
    {
        if (! FormValidator::validateStreetNumber($_POST['street_number'])) {
            return toViewWithError('register', 'street number is not valid', $_POST);
        }
    }
}