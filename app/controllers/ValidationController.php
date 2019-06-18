<?php 

namespace App\Controllers;

use App\Models\FormProcessing\FormValidator;

class ValidationController extends Controller
{
    public function validate()
    {
        // Clean request data from white spaces at the edges
        $this->request = array_map('trim', $this->request);

        if ($this->checkEmptyFields('register') || $this->checkTextFields() ||
            $this->checkEmail() || $this->checkPhoneNumber() ||
            $this->checkPassword() || $this->checkStreetNumber())
        {
            return 0;
        }

        return 1;
    }

    public function checkEmptyFields($view)
    {
        if (FormValidator::areAllFieldsEmpty($this->request))
        {
            return toViewWithError($view, 'Please, fill all the fields.', $this->request);
        }
    }

    private function checkTextFields()
    {
        $textField = FormValidator::validateAllTextFields($this->request);
        if($textField !== 1)
            return toViewWithError('register', "$textField is not valid", $this->request);      
    }

    private function checkEmail()
    {
        if(! FormValidator::validateEmail($this->request['email']))
            return toViewWithError('register', 'email is not valid', $this->request);
    }

    private function checkPhoneNumber()
    {
        if(! FormValidator::validatePhoneNumber($this->request['phone_number'], 11))
            return toViewWithError('register', 'phone number is not valid', $this->request);
    }
    
    private function checkPassword()
    {
        if(! FormValidator::validatePassword($this->request['password']))
            return toViewWithError('register', 'password is not valid', $this->request);
    }

    private function checkStreetNumber()
    {
        if (! FormValidator::validateStreetNumber($this->request['street_number']))
            return toViewWithError('register', 'street number is not valid', $this->request);
    }
}