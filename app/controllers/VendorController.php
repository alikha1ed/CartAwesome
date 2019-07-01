<?php 

namespace App\Controllers;

use App\Models\Category;

class VendorController
{
    public function index()
    {
        return view('profile/vendor', ['categories' => Category::getAll()]);
    }
}
