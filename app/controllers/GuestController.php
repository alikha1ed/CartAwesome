<?php

namespace App\Controllers;

use App\Models\FormProcessing\FormValidator;
use App\Models\User;

class GuestController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function addUser()
    {
        if ( (new ValidationController($this->request, (new FormValidator($this->request->request)), 'register') )->validate()) {
            return $this->createUser();
        }
        
        return 0;
    }

    private function createUser()
    {        
        if ( (new User($this->request->request) )->create()) {
            return redirect('login');
        }

        return view('register', ['error' => 'the email already exists']);
    }
}
