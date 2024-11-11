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
// Product routes
$router->post('/admin/add-product', 'App\Controllers\ProductController@add');
$router->get('/admin/edit-product/{id}', 'App\Controllers\ProductController@editProduct');
$router->post('/admin/edit-product/{id}', 'App\Controllers\ProductController@editProduct');
$router->get('/admin/delete-product/{id}', 'ProductController@deleteProduct');
$router->post('/admin/delete-product/(\d+)', 'App\Controllers\ProductController@deleteProduct');
// Category routes
$router->get('/admin', 'App\Controllers\CategoryController@index');
$router->post('/admin/add-category', 'App\Controllers\CategoryController@addCategory');
$router->get('/admin/edit-category/{id}', 'App\Controllers\CategoryController@editCategory');
$router->post('/admin/edit-category/{id}', 'App\Controllers\CategoryController@editCategory');
$router->get('/admin/delete-category/{id}', 'App\Controllers\CategoryController@deleteCategory');
$router->post('/admin/delete-category/{id}', 'App\Controllers\CategoryController@deleteCategory');
// User routes
$router->get('/admin', 'App\Controllers\UserController@index');
$router->post('/admin/add-user', 'App\Controllers\UserController@addUser');
$router->post('/admin/edit-user/{id}', 'App\Controllers\UserController@editUser');
$router->post('/admin/delete-user/{id}', 'App\Controllers\UserController@deleteUser');
// Payment routes
$router->post('/order-confirmation', 'App\Controllers\CartController@processPayment');
// Run the Router
$router->run();