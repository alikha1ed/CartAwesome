<?php 

namespace App\Models;

use App\Core\App;

class Category
{
    public  static function create($name)
    {
        return App::get('database')->insert('category', ['name' => $name]);
    }

    public static function get($name)
    {
        return App::get('database')->selectColumns(
            'category',
            ['id'],
            'name',
            ['name' => $name]
        );
    }

    public static function getAll()
    {
        return App::get('database')->selectAll('category', ['id', 'name']);
    }

    public static function update($newCategory)
    {
        return App::get('database')->update('category', $newCategory);
    }
}
