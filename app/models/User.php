<?php 

namespace App\Models;

use App\Core\App;

class User
{
    private $request;

    public function __construct($request) {
        $this->request = $request;
    }

    public function create()
    {
        if($this->createUserAddress())
        {
            return App::get('database')->insert('user', $this->prepareUser());
        }
        return 0;
    }

    private function createUserAddress()
    {    
        if (App::get('database')->insert('user_address', $this->getUserAddress()))
            return 1;

        return 0;
    }

    private function getUserAddress()
    {
        $userAddress = $this->request;

        unset(
            $userAddress['first_name'],
            $userAddress['second_name'],
            $userAddress['email'],
            $userAddress['phone_number'],
            $userAddress['password'] 
        );

        return $userAddress;
    }

    private function prepareUser()
    {
        $userData = $this->getUserData();

        $userData['address_fk'] = App::get('database')->getTheLastRows('user_address', ['id'], 'id', 1)['id'];
        $userData['role_fk'] = 1;
        $userData['password'] = password_hash($userData['password'], PASSWORD_BCRYPT);

        return $userData;
    }

    private function getUserData()
    {
        $userData = $this->request;

        unset(
            $userData['street_number'],
            $userData['street_name'],
            $userData['area'],
            $userData['city']
        );

        return $userData;
    }
}
