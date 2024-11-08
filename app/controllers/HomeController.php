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
        $productController = new ProductController();
        $products = $productController->getCarouselProducts();
        // // ob_start();
        // include 'app/views/home/index.php';
        // $content = ob_get_clean();

        // require_once ROOTDIR . 'app/views/layout/client_layout.php'; 
        $this->renderPage('home/index', [
            'products' => $products ?? [],
            'title' => $title
        ]);
    }

}