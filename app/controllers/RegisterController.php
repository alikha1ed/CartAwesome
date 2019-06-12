<?php 

namespace App\Controllers;

use App\Models\FormProcessing\FormValidator;

class RegisterController
{
    public function index()
    {
        return view('register');
    }

    public function validate()
    {
        // Clean request data from white spaces at the edges
        $_POST = array_map('trim', $_POST);

        if ($this->checkEmptyFields() || $this->checkTextFields() ||
            $this->checkEmail() || $this->checkPhoneNumber() ||
            $this->checkPassword() || $this->checkStreetNumber())
        {
            return 0;
        }
        return 1;
    }

    private function checkEmptyFields()
    {
        if (FormValidator::areAllFieldsEmpty($_POST))
        {
            unset($_POST['password']);
            return returnToViewWithError('register', 'Please, fill all the fields.', $_POST);
        }
    }

    private function checkTextFields()
    {
        $textField = FormValidator::validateAllTextFields($_POST);
        if($textField !== 1)
            return returnToViewWithError('register', "$textField is not valid", $_POST);      
    }

    private function checkEmail()
    {
        if(! FormValidator::validateEmail($_POST['email']))
        return returnToViewWithError('register', 'email is not valid', $_POST);
    }

    private function checkPhoneNumber()
    {
        if(! FormValidator::validatePhoneNumber($_POST['phone_number']))
        return returnToViewWithError('register', 'phone number is not valid', $_POST);
    }
    
    private function checkPassword()
    {
        if(! FormValidator::validatePassword($_POST['password']))
            return returnToViewWithError('register', 'password is not valid', $_POST);
    }

    private function checkStreetNumber()
    {
        if (! FormValidator::validateStreetNumber($_POST['street_number']))
            return returnToViewWithError('register', 'street number is not valid', $_POST);
    }
}