<?php 

namespace App\Core;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class RequestHandler
{
    public function getRequest()
    {
        $request = Request::createFromGlobals();

        $request->setSession(new Session());
        $request->getSession()->start();
        
        return $request;
    }
}

