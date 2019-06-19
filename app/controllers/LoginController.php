<?php 

namespace App\Controllers;

use App\Core\App;

class LoginController
{
    public function index()
    {
        return view('login');
    }

    public function auth()
    {
        if ($this->areFieldsFilled() && ! $this->arePasswordsMatched()) {
            return toViewWithError('login', 'incorrect email or password');
        }
        return RolesController::goToUserProfile($this->getUserData()['role_fk']);
    }
    
    private function areFieldsFilled()
    {
        $validate = ValidationController::load($_POST);

        return $validate->checkEmptyFields('login') ? 0 : 1;
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