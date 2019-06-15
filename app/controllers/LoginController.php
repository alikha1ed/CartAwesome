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
        $storedPassword = $this->getStoredPassword();

        if (! is_null($storedPassword))
        {
            if (password_verify($_POST['password'], $storedPassword))
            die("PASSED");
        }
        $data = ['email' => $_POST['email']];
        return toViewWithError('login', 'incorrect email or password', $data);
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