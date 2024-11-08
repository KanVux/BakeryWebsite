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

$router->get('/catagory','\App\Controllers\CategoryController@index');


$router->run();