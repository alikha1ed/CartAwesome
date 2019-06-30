<?php 

namespace App\Controllers;

class RolesController
{
    public static function goToUserProfile($role_id)
    {
        switch ($role_id) {
            case '1':
                return self::customer();

            case '2':
                return self::vendor();

            case '3':
                return self::admin();

            case '4':
                return self::root();

            default:
                die('Whoops, Something wrong happened.');
        }
    }
    public function admin()
    {
        return redirect('profile/admin');
    }

    public function vendor()
    {
        return redirect('profile/vendor');
    }
}
