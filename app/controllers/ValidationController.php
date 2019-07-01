<?php 

namespace App\Controllers;

use App\Models\FormProcessing\FormValidator;
use App\Core\Request;

class ValidationController
{
    private $view;

    public function __construct($view) {
        $this->view = $view;
    }
    
    public function validate()
    {
        // Clean request data from white spaces at the edges
        $_POST = array_map('trim', $_POST);

        return (self::checkEmptyFields() || self::checkTextFields() ||
            self::checkEmail() || self::checkPhoneNumber() ||
            self::checkPassword() || self::checkStreetNumber()) ? 0 : 1;
    }

    public function checkEmptyFields()
    {
        if (FormValidator::areAllFieldsEmpty($_POST)) {
            return view($this->view, ['error' => 'Please, fill all the fields.']);
        }
    }

    public function checkTextFields()
    {
        $textField = FormValidator::validateAllTextFields($_POST);

        if ($textField !== 1) {
            return view($this->view, [
                'formData' => $_POST, 
                'error' => "$textField is not valid"
            ]);
        }
    }

    private function checkEmail()
    {
        if (! FormValidator::validateEmail($_POST['email'])) {
            return view($this->view, [
                'formData' => $_POST,
                'error' => 'email is not valid'
            ]);
        }
    }

    private function checkPhoneNumber()
    {
        if (! FormValidator::validatePhoneNumber($_POST['phone_number'], 11)) {
            return view($this->view, [
                'formData' => $_POST,
                'error' => 'phone number is not valid'
            ]);
        }
    }
    
    private function checkPassword()
    {
        if (! FormValidator::validatePassword($_POST['password'])) {
            return view($this->view, [
                'formData' => $_POST,
                'error' => 'password is not valid'
            ]);
        }
    }

    private function checkStreetNumber()
    {
        if (! FormValidator::validateStreetNumber($_POST['street_number'])) {
            return view($this->view, [
                'formData' => $_POST,
                'error' => 'street number is not valid'
            ]);
        }
    }
}