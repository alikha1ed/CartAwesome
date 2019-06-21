<?php 

namespace App\Controllers;

use App\Core\App;
use App\Core\Request;

class CategoriesController
{
    public function add()
    {
        if (ValidationController::checkEmptyFields() || ValidationController::checkTextFields()) {
            return;
        }
        if ($this->checkIfCategoryExists()) {
            return toViewWithError(Request::uri(), 'category already exists');
        }

        if (App::get('database')->insert('category', ['name' => $_POST['name']])) {
            return toViewWithSuccess(Request::uri(), 'category added successfully');
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

