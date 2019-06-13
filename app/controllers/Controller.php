<?php 

namespace App\Controllers;

abstract class Controller
{
    protected $request;

    public function __construct($request) {
        $this->request = $request;
    }

    public static function load($request)
    {
        return new static($request);
    }
}
