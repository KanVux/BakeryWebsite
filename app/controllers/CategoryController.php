<?php

namespace App\Controllers;

use App\Models\Category;

class CategoryController extends Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $category = new Category(PDO());
        exit($this->renderPage('category/index',$category->getCategory()));
    }
}