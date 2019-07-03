<?php 

namespace App\Controllers;

use App\Models\FormProcessing\FormValidator;
use Symfony\Component\HttpFoundation\Request;

class ValidationController extends Controller
{
    private $formValidator;
    private $view;

    public function __construct(Request $request, FormValidator $formValidator, $view) {

        $this->request = $request;
        $this->formValidator = $formValidator;
        $this->view = $view;
    }
    
    public function validate()
    {
        // Clean request data from white spaces at the edges
        $this->request->request = array_map('trim', $this->request->request->all());

        return(
                $this->checkEmptyFields() || $this->checkTextFields() ||
                $this->checkEmail() || $this->checkPhoneNumber() ||
                $this->checkPassword() || $this->checkStreetNumber()
        )   ? 0 : 1;
    }

    public function checkEmptyFields()
    {
        if ($this->formValidator->areAllFieldsEmpty()) {
            return view($this->view, ['error' => 'Please, fill all the fields.']);
        }
    }

    public function checkTextFields()
    {
        $textField = $this->formValidator->validateAllTextFields();
        
        if ($textField !== 1) {
            return view($this->view, [
                'formData' => $this->request->request, 
                'error' => "$textField is not valid"
            ]);
        }
    }

    private function checkEmail()
    {
        if (! $this->formValidator->validateEmail()) {
            return view($this->view, [
                'formData' => $this->request->request->all(),
                'error' => 'email is not valid'
            ]);
        }
    }

    private function checkPhoneNumber()
    {
        if (! $this->formValidator->validatePhoneNumber(11)) {
            return view($this->view, [
                'formData' => $this->request->request->all(),
                'error' => 'phone number is not valid'
            ]);
        }
    }
    
    private function checkPassword()
    {
        if (! $this->formValidator->validatePassword()) {
            return view($this->view, [
                'formData' => $this->request->request->all(),
                'error' => 'password is not valid'
            ]);
        }
    }

    private function checkStreetNumber()
    {
        if (! $this->formValidator->validateStreetNumber()) {
            return view($this->view, [
                'formData' => $this->request->request->all(),
                'error' => 'street number is not valid'
            ]);
        }
    }
}