<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\FormProcessing\FormValidator;

class AdminController extends Controller
{
    public function index()
    {
        return view('profile/admin', ['categories' => Category::getAll()]);
    }

    public function addCategory()
    {
        $validationController = new ValidationController($this->request, (new FormValidator($this->request->request)), 'profile/admin');
        if ($validationController->checkEmptyFields() || $validationController->checkTextFields()) {
            return;
        }
        if ($this->checkIfCategoryExists()) {
            return view(
                'profile/admin',
                ['categories' => Category::getAll(), 'error' => 'category already exists']
            );
        }

        if (Category::create($this->request->request->get('name'))) {
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
        if (empty($this->request->request->get('name'))) {
            return view('edit/category', ['error' => 'please fill all the fields']);
        }
        if (!Category::update($this->request->request->all())) {
            return view('edit/category', ['error' => 'this category already exists']);
        }

        return redirect('profile/admin');
    }

    private function checkIfCategoryExists()
    {
        return Category::get($this->request->request->get('name'));
    }
}
