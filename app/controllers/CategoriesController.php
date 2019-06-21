<?php 

namespace App\Controllers;

use App\Core\App;
use App\Core\Request;
use App\Models\Category;

class CategoriesController
{
    public function add()
    {
        if (ValidationController::checkEmptyFields() || ValidationController::checkTextFields()) {
            return;
        }
        if ($this->checkIfCategoryExists()) {
            return view(Request::uri(), (new Category)->getAllCategories(), 'category already exists');
        }

        if (App::get('database')->insert('category', ['name' => $_POST['name']])) {
            return redirect(Request::uri());
        }

        return 0;
    }

    private function checkIfCategoryExists()
    {
        return App::get('database')->selectColumns(
            'category',
            ['id'],
            'name',
            ['name' => $_POST['name']]
        );
    }
}

