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
            return view(
                Request::uri(),
                ['categories' => Category::getAllCategories(), 
                'error' => 'category already exists']
            );
        }

        if (App::get('database')->insert('category', ['name' => $_POST['name']])) {
            return redirect(Request::uri());
        }

        return 0;
    }

    public function edit()
    {
        return view('edit/category');
    }

    public function save()
    {
        if (empty($_POST['name'])) {
            return view('edit/category', ['error' => 'please fill all the fields']);
        }
        if (! Category::update($_POST)) {
            return view('edit/category', ['error' => 'this category already exists']);
        }

        return redirect('profile/admin');
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

