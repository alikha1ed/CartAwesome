<?php 

namespace App\Controllers;

use App\Controllers\ValidationController;

class FormController
{
    public function index()
    {
        return view('register');
    }

    public function handle()
    {
        $validationController = ValidationController::load($_POST);
        
        if($validationController->validate())
        {
            $registerController = RegisterController::load($_POST);
            if ($registerController->register())
                return toViewWithMessage('login', 'account created successfully');
            else
                return toViewWithMessage('register', 'the email already exists');
        }
    }
}