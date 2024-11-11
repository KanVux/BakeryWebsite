<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        
        if (!isset($_SESSION['user_id']) ||  $_SESSION['acc_type'] == 0) {
             redirect('/home'); 
         }

    }

    public function index()
    {
        $products = (new Product(PDO()))->getProducts(['*'],null);
        $categories = (new Category(PDO()))->getCategories(['*'], null);
        $users = (new User(PDO()))->getUsers();
        $this->renderPage('admin/index', [
            'products' => $products,
            'categories' => $categories,
            'users' => $users
        ]);
        
    }
}
