<?php
namespace App\Controllers;

use App\Models\Product;

class ProductController extends Controller{ 
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $products = new Product(PDO());
        exit($this->renderPage('product/index', $products->getProducts()));
    }

    public function getCarouselProducts()
    {
        $productModel = new Product(PDO());
        $products = array_map(function ($product) {
            return $product->toArray();
        }, $productModel->getProducts());
        return($products);
    }

}