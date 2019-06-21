<?php 

namespace App\Controllers;

use App\Core\App;

class AuthController
{
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        if ($this->areFieldsFilled() && ! $this->arePasswordsMatched()) {
            return view('login', [], 'incorrect email or password');
        }

        session_start();
        $_SESSION['user'] = $_POST;

        return RolesController::goToUserProfile($this->getUserData()['role_fk']);
    }
    
    public function logout()
    {
        session_start();
        session_destroy();
        
        return redirect('');
    }
    private function areFieldsFilled()
    {
        return ValidationController::checkEmptyFields('login') ? 0 : 1;
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
        return App::get('database')->selectColumns(
            'user',
            ['password', 'role_fk'],
            'email',
            ['email' => $_POST['email']]
        );
    }
}