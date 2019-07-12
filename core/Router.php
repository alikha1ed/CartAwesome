<?php 

namespace App\Core;

use Exception;
use Symfony\Component\HttpFoundation\Request;

class Router
{
    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    // Istantiate an object from Router class.
    public static function load($file)
    {
        $router = new self;
        // Delegate GET and POST requests to Controllers
        require $file;

        return $router;
    }

    // Delegate the GET request to a controller
    public function get($uri, $controller, $anonymousFunction = null)
    {
        $this->routes['GET'][$uri] = $controller;

        $this->executeAnonymousFunction();
    }

    // Delegate the POST request to a controller
    public function post($uri, $controller, $anonymousFunction = null)
    {
        $this->executeAnonymousFunction();

        $this->routes['POST'][$uri] = $controller;        
    }

    // Checks if the controller and its action exist
    public function direct(Request $request, $uri, $requestType)
    {
        // Checks if the uri is registered in the GET or POST URIs
        if (array_key_exists($uri, $this->routes[$requestType]))
        {
            // Example: callAction('PagesController', 'index')
            return $this->callAction($request, ...explode('@', $this->routes[$requestType][$uri]));
        }
        throw new Exception("Whoopps, no route found for {$uri} URI");
    }

    // Execute controller method
    private function callAction(Request $request, $controller, $action)
    {
        $controller = "App\Controllers\\{$controller}";
        $controller = new $controller($request);
           
        if (! method_exists($controller, $action)) {
            throw new Exception("This controller has no this action.");
        }

        return $controller->$action();
    }

    private function executeAnonymousFunction($anonymousFunction = null)
    {
        if (!is_null($anonymousFunction))
            $anonymousFunction();
    }
}