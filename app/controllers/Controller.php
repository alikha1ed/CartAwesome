<?php

 namespace App\Controllers;	

 use Symfony\Component\HttpFoundation\Request;

 abstract class Controller	
{	
    protected $request;	

    public function __construct(Request $request = NULL) {	
        $this->request = $request;	
    }

    public static function load(Request $request = NULL)	
    {   	
        return new static($request);	
    }	
}