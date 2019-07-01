<?php

namespace App\Controllers;

use App\Models\User;

class GuestController
{
    public function register()
    {
        return view('register');
    }

    public function addUser()
    {
        $validationController = new ValidationController('register');
        
        if ($validationController->validate()) {
            return $this->createUser();
        }

        return 0;
    }

    private function createUser()
    {        
        if ( (new User($_POST) )->create()) {
            return redirect('login');
        }

        return view('register', ['error' => 'the email already exists']);
    }
}
