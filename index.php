<?php 

use App\Core\{Router, Request};

require 'core/helpers.php';
require 'vendor/autoload.php';
require 'core/bootstrap.php';

$router = Router::load('app/routes.php');

$router->direct(Request::uri(), Request::method());