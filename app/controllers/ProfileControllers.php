<?php 

namespace App\Controllers;

use App\Core\App;
use App\Models\Category;

class ProfileController
{

    public function vendor()
    {
        return view('profile/vendor', ['categories' => Category::getAll()]);
    }
}

