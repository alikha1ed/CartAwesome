<?php 

// Home Controller
$router->get('', 'HomeController@index');

// Guest Controller
$router->get('register', 'GuestController@register');

$router->post('add/user', 'GuestController@addUser');

// Auth Controller
$router->get('login', 'AuthController@login');

$router->post('login', 'AuthController@authenticate');

$router->get('logout', 'AuthController@logout');

// Profile Controller 
$router->get('profile/admin', 'ProfileController@admin');

$router->get('profile/vendor', 'ProfileController@vendor');

// Categories Controller
$router->post('profile/admin', 'CategoriesController@add');

$router->post('edit/category', 'CategoriesController@edit');

$router->post('save/category', 'CategoriesController@save');