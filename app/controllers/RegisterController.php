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
        // Clean request data from outside white spaces
        $_POST = array_map('trim', $_POST);
        
        if (FormValidator::areAllFieldsEmpty($_POST))
        {
            unset($_POST['password']);
            return returnToViewWithError('register', 'Please, fill all the fields.', $_POST);
        }
        
        $textField = FormValidator::validateAllTextFields($_POST);
        if($textField !== 1)
            return returnToViewWithError('register', "$textField is not valid", $_POST);

        if(! FormValidator::validateEmail($_POST['email']))
            return returnToViewWithError('register', 'email is not valid', $_POST);

        if(! FormValidator::validatePhoneNumber($_POST['phone_number']))
            return returnToViewWithError('register', 'invalid phone number', $_POST);
    
        if(! FormValidator::validatePassword($_POST['password']))
            return returnToViewWithError('register', 'invalid password', $_POST);
    }
    
}