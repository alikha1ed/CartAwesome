<?php 

$router->get('', 'HomeController@index');

$router->get('register', 'FormController@index');

$router->post('register', 'FormController@handle');

$router->get('login', 'AuthController@index');

$router->post('login', 'AuthController@login');

$router->get('logout', 'AuthController@logout');

$router->get('profile/admin', 'ProfileController@admin');

$router->post('profile/admin', 'CategoriesController@add');