<?php 

namespace App\Models;

use App\Core\App;

class Category
{
    private $name;

    public function getName()
    {
        return $this->name();
    }

    public function getAllCategories()
    {
        return App::get('database')->selectAll('category', ['name']);
    }
}
