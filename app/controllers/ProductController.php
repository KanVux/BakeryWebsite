<?php
namespace App\Controllers;

use App\Models\Product;

class ProductController extends Controller{ 
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $product = new Product(PDO());
        $title = 'Products Page';
        $this->renderPage('product/index', [
        'products'=>$product->getProducts(['*'], null),
        'title'=>$title
    ]);
    }
}