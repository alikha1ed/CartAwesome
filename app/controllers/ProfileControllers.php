<?php 

namespace App\Controllers;

use App\Core\App;
use App\Models\Category;

class ProfileController
{
    public function admin()
    {
        return view('profile/admin' ,['categories' => Category::getAllCategories()]);
    }

    public function vendor()
    {
        return view('profile/vendor');
    }
}

