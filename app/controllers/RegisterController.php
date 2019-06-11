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
        if (FormValidator::isFieldEmpty($_POST))
        {
            unset($_POST['password']);
            returnToViewWithError('register', 'Please, fill all the fields.', $_POST);
        }
    }
}
