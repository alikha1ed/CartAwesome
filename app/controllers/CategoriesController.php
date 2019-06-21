<?php 

namespace App\Controllers;

use App\Core\App;

class CategoriesController
{
    public function add()
    {
        if (ValidationController::checkEmptyFields('profile/admin') || ValidationController::checkTextFields('profile/admin')) {
            return;
        }
        if ($this->checkIfCategoryExists()) {
            return toViewWithError('profile/admin', 'category already exists.');
        }

        if (App::get('database')->insert('category', ['name' => $_POST['name']])) {
            return toViewWithSuccess('profile/admin', 'category added successfully.');
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

