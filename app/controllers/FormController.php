<?php 

namespace App\Controllers;

use App\Models\User;

class FormController
{
    public function index()
    {
        return view('register');
    }

    public function handle()
    {   
        if (ValidationController::validate()) {
            return $this->createAccount();
        }

        return 0;
    }

    private function createAccount()
    {
        $user = new User($_POST);
        
        if ($user->create()) {
            return redirect('login');
        }

        return view('register', 'the email already exists');
    }
}