<?php

namespace App\Controllers;

class AboutUsController extends Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index() {
        $title = 'About Us';
        $this->renderPage('about_us/index', [
            'title' => $title
        ]);
    }
}