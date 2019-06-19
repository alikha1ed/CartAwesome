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
        
        if ($validationController->validate()) {
            return $this->createAccount();
        }
        
        return 0;
    }

    private function createAccount()
    {
        $registerController = RegisterController::load();

        if ($registerController->register()) {
            return toViewWithSuccess('login', 'account created successfully');
        }

        return toViewWithError('register', 'the email already exists');
    }
}