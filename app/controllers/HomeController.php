<?php

namespace App\Controllers;

use App\Models\Product;
use App\Controllers\ProductController;

class HomeController extends Controller{
    private $productController;
    public function __construct(){
       parent::__construct();
    }
    public function index(){  
        $title = 'Home Page';
        $product = new Product(PDO());
        $products = $product->getProducts();
        $this->renderPage('home/index', [
            'products' => $products ?? [],
            'title' => $title
        ]);
    }

}