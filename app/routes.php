<?php 

$router->get('', 'HomeController@index');

$router->get('register', 'RegisterController@index');

$router->post('validate', 'RegisterController@validate');