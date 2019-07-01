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

// Admin Controller 
$router->get('profile/admin', 'AdminController@index');
$router->post('add/category', 'AdminController@addCategory');
$router->post('edit/category', 'AdminController@editCategory');
$router->post('save/category', 'AdminController@saveCategory');

// Vendor Controller 
$router->get('profile/vendor', 'VendorController@index');