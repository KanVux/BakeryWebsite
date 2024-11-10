<?php

namespace App\Controllers;

class NewsController extends Controller{
    public function index() {
        $this->renderPage('news/index');
    }
}