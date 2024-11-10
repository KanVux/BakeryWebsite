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
$router->post('/logout', '\App\Controllers\Auth\LoginController@destroy');
// Product routes
$router->get('/product','\App\Controllers\ProductController@index');
// News routes
$router->get('/news', '\App\Controllers\NewsController@index');
// Cart routes
$router->get('/cart', 'App\Controllers\CartController@view');
$router->get('/cart/add/(\d+)', 'App\Controllers\CartController@add');
$router->get('/cart/remove/(\d+)', 'App\Controllers\CartController@remove');
$router->get('/cart/clear', 'App\Controllers\CartController@clear');
$router->post('/cart/update/(\d+)', 'App\Controllers\CartController@update');
// Admin routes
$router->get('/admin', 'App\Controllers\AdminController@index');
$router->get('/admin/edit/{id}', 'App\Controllers\AdminController@edit');
$router->post('/admin/delete/{id}', 'App\Controllers\AdminController@delete');

$router->run();