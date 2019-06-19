<?php 

$router->get('', 'HomeController@index');

$router->get('register', 'FormController@index');

$router->post('add/user', 'FormController@handle');

$router->get('login', 'AuthController@index');

$router->post('login', 'AuthController@login');

$router->get('logout', 'AuthController@logout');

$router->get('profile/admin', 'ProfileController@admin');

$router->post('add/category', 'CategoriesController@add');