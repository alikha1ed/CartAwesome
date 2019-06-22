<?php 

namespace App\Models;

use App\Core\App;

class Category
{
    public static function getAllCategories()
    {
        return App::get('database')->selectAll('category', ['id', 'name']);
    }

    public static function update($newCategory)
    {
        return App::get('database')->update('category', $newCategory);
    }
}
