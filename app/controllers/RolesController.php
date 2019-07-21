<?php 

namespace App\Controllers;

class RolesController extends Controller
{
    public function goToUserProfile($role_id)
    {
        switch ($role_id) {
            case '1':
                return $this->customer();

            case '2':
                return $this->vendor();

            case '3':
                return $this->admin();

            case '4':
                return $this->root();

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
