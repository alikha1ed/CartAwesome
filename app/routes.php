<?php 

$router->get('', 'HomeController@index');

$router->get('register', 'FormController@index');

$router->post('add/user', 'FormController@handle');

$router->get('login', 'LoginController@index');

$router->post('login', 'LoginController@auth');

$router->post('add/category', 'CategoriesController@add');