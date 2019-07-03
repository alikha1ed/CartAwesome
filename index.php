<?php 

use App\Core\Router;
use Symfony\Component\HttpFoundation\Request;

require 'vendor/autoload.php';

$request = Request::createFromGlobals();

$router = Router::load('app/routes.php');

$router->direct($request, trim($request->getPathInfo(), '/'), $request->getMethod());