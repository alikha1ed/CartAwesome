<?php 

use App\Core\Router;
use App\Core\RequestHandler;

require 'vendor/autoload.php';

$request = (new RequestHandler())->getRequest();

$router = Router::load('app/routes.php');

$router->direct($request, trim($request->getPathInfo(), '/'), $request->getMethod());