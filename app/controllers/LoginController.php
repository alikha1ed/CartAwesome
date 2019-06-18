<?php 

namespace App\Controllers;

use App\Core\App;

class LoginController
{
    public function index()
    {
        return view('login');
    }

    private function areFieldsFilled()
    {
        $validate = ValidationController::load($_POST);

        if ($validate->checkEmptyFields('login'))
            return 0;

        return 1;
    }

    private function arePasswordsMatched()
    {
        if (
            ! is_null($this->getStoredPassword()) &&
            password_verify($_POST['password'], $this->getStoredPassword())
            )
                return 1;
        return 0;
    }

    public function auth()
    {
        if ($this->areFieldsFilled() && ! $this->arePasswordsMatched())
        {
            return toViewWithError('login', 'incorrect email or password');
        }
        die('success');
    }

    private function getStoredPassword()
    {
        return App::get('database')->selectColumns(
            'user',
            ['password'],
            'email',
            ['email' => $_POST['email']]
        )[0];
    }
}