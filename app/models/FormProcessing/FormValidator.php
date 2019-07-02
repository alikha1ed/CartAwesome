<?php 

namespace App\Models\FormProcessing;

use Symfony\Component\HttpFoundation\Request;

class FormValidator 
{
    private $request;

    public function __construct($request) {
        $this->request = $request;
    }

    public function areAllFieldsEmpty()
    {
        foreach($this->request as $field => $value)
        {
            if (empty($value)) { 
                return true;
            }
        }
        return false;
    }

    public function validateAllTextFields()
    {
        foreach($this->getTextualFields() as $textualField => $value)
        {
            if (! $this->isTextFieldValid($value)) {
                return $textualField;
            }
        }
        return 1;
    }

    private function getTextualFields()
    {
        $textFields = $this->request->all();

        unset($textFields['email'], $textFields['phone_number'], $textFields['password'], $textFields['street_number']);
        
        return $textFields;
    }

    private function isTextFieldValid($field)
    {
        return (
            preg_match('/[\'^£$%&*()}{!@#~?><>,|=_+¬-]/', $field)) ? 0 : 1;            
    }

    public function validateEmail()
    {
        return (!filter_var($this->request->get('email'), FILTER_VALIDATE_EMAIL)) ? 0 : 1;
    }

    public function validatePhoneNumber($phoneLength)
    {
        return (
                    strlen($this->request->get('phone_number')) < $phoneLength ||
                    !is_numeric($this->request->get('phone_number'))
               )
        ? 0 : 1;
    }

    public function validatePassword()
    {
        return (
            self::checkPasswordLength($this->request->get('password'), 7) &&
            preg_match("#[0-9]+#", $this->request->get('password')) &&
            preg_match("#[a-z]+#", $this->request->get('password')) &&
            preg_match("#[A-Z]+#", $this->request->get('password'))
        );
    }

    private function checkPasswordLength()
    {
        $minimumPasswordLength = 7;

        return(
                strlen($this->request->get('password')) > $minimumPasswordLength
        ) ? true : false;
    }

    public function validateStreetNumber()
    {
        return is_numeric($this->request->get('street_number'));
    }
}

