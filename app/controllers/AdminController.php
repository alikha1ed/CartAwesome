<?php

namespace App\Controllers;

use App\Models\Category;
use App\Core\Request;

class AdminController
{
    public function index()
    {
        return view('profile/admin', ['categories' => Category::getAll()]);
    }

    public function addCategory()
    {
        $validationController = new ValidationController('profile/admin');
        if ($validationController->checkEmptyFields() || $validationController->checkTextFields()) {
            return;
        }
        if ($this->checkIfCategoryExists()) {
            return view(
                'profile/admin',
                ['categories' => Category::getAll(),
                    'error' => 'category already exists']
            );
        }

        if (Category::create($_POST['name'])) {
            return redirect('profile/admin');
        }

        return 0;
    }

    public function editCategory()
    {
        return view('edit/category');
    }

    public function saveCategory()
    {
        if (empty($_POST['name'])) {
            return view('edit/category', ['error' => 'please fill all the fields']);
        }
        if (!Category::update($_POST)) {
            return view('edit/category', ['error' => 'this category already exists']);
        }

        return redirect('profile/admin');
    }

    private function checkIfCategoryExists()
    {
        return Category::get($_POST['name']);
    }
}
