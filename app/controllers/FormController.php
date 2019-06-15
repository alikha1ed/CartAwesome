<?php 

namespace App\Controllers;

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
            $registerController = RegisterController::load();
            if ($registerController->register())
                return toViewWithSuccess('login', 'account created successfully');
            else
                return toViewWithError('register', 'the email already exists');
        }
    }
}