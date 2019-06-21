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
        if (App::get('database')->insert('user', $this->prepareUser())) {
            return $this->createUserAddress();
        }

        return 0;
    }

    private function createUserAddress()
    {
        $userAddress = $this->getUserAddress();
        // Get the user id from the user table
        $userAddress['user_fk'] = App::get('database')->getTheLastRows('user', ['id'], 'id', 1)['id'];

        return (App::get('database')->insert('user_address', $userAddress));
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
        $userData = $this->getUserInformation();
                
        $userData['password'] = password_hash($userData['password'], PASSWORD_BCRYPT);

        return $userData;
    }

    private function getUserInformation()
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
