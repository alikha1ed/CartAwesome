<?php 

namespace App\Controllers;

use App\Models\User;

class RegisterController extends Controller
{
    public function register()
    {
        $user = new User($_POST);
        return $user->create() ? 1 : 0;
    }
}
