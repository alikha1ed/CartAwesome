<?php 

namespace App\Models;

use App\Core\App;

class Category
{
    public function getAllCategories()
    {
        return App::get('database')->selectAll('category', ['name']);
    }
}
