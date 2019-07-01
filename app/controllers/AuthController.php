<?php 

namespace App\Controllers;

use App\Models\User;
use App\Core\App;

class AuthController
{
    public function login()
    {
        return view('login');
    }

    public function authenticate()
    {
        if ($this->areFieldsFilled() && ! $this->arePasswordsMatched()) {
            return view('login', ['error' => 'incorrect email or password']);
        }

        session_start();
        $_SESSION['user'] = $_POST;
        $_SESSION['user']['id'] = $this->getUserData()['id'];

        return RolesController::goToUserProfile($this->getUserData()['role_fk']);
    }
    
    public function logout()
    {
        killSession();

        return redirect('');
    }
    private function areFieldsFilled()
    {
        return ( new ValidationController('login') )->checkEmptyFields('login') ? 0 : 1;
    }

    private function arePasswordsMatched()
    {
        return (
            ! is_null($this->getUserData()['password']) &&
            password_verify($_POST['password'], $this->getUserData()['password'])
        ) ? 1 : 0;
    }

    private function getUserData()
    {
        return (new User)->get($_POST['email']);
    }
}