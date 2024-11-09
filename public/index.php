<?php

session_start();
require 'bootstrap.php';

define('APP_NAME','Kan Bakery');
$router = new \Bramus\Router\Router();

// Home routes
$router->get('/', '\App\Controllers\HomeController@index');
$router->get('/home','\App\Controllers\HomeController@index');
// About Us routes
$router->get('/about_us','\App\Controllers\AboutUsController@index');
// Errors routes
$router->set404('\App\Controllers\Controller@render404');
// Auth routes
$router->get('/login','\App\Controllers\Auth\LoginController@create');
$router->post('/login', '\App\Controllers\Auth\LoginController@store');
$router->get('/register', '\App\Controllers\Auth\RegisterController@create');
$router->post('/register', '\App\Controllers\Auth\RegisterController@store');


$router->get('/catagory','\App\Controllers\CategoryController@index');


$router->run();