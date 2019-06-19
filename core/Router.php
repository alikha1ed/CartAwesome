<?php 

namespace App\Core;
use Exception;

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
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    // Delegate the POST request to a controller
    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    // Checks if the controller and its action exist
    public function direct($uri, $requestType)
    {
        // Checks if the uri is registered in the GET or POST URIs
        if (array_key_exists($uri, $this->routes[$requestType]))
        {
            // Example: callAction('PagesController', 'index')
            return $this->callAction(...explode('@', $this->routes[$requestType][$uri]));
        }
        throw new Exception("Whoopps, no route found for {$uri} URI");
    }

    // Execute controller method
    private function callAction($controller, $action)
    {
        $controller = "App\Controllers\\{$controller}";
        $controller = new $controller;
        
        if (! method_exists($controller, $action)) {
            throw new Exception("{$controller} has no {$action} action");
        }

        return $controller->$action();
    }
}