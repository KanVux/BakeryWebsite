<?php

namespace App\Controllers;

class AboutUsController extends Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index() {
        $this->renderPage('about_us/index');
    }
}