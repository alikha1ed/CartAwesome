<?php 

$router->get('', 'HomeController@index');

$router->get('register', 'FormController@index');

$router->post('register', 'FormController@handle');

$router->get('login', 'LoginController@index');

$router->post('login', 'LoginController@auth');
