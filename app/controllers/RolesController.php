<?php 

namespace App\Controllers;

class RolesController
{
    public static function goToUserProfile($role_id)
    {
        switch ($role_id) {
            case '1':
                return self::customer();
                break;
            
            case '2':
                return self::vendor();
                break;

            case '3':
                return self::admin();
                break;

            case '4':
                return self::root();
                break;

            default:
                die('Whoops, Something wrong happened.');
                break;
        }
    }
    public function admin()
    {
        return view('/profile/admin');
    }
}
