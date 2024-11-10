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
    public function edit($id)
    {
        // Lấy dữ liệu của bản ghi cần chỉnh sửa
        $product = (new Product(PDO()))->find($id);

        // Hiển thị trang chỉnh sửa
        $this->renderPage('admin/edit', ['product' => $product]);
    }

    public function delete($id)
    {
        // Xóa dữ liệu
        (new Product(PDO()))->delete($id);

        // Sau khi xóa, quay lại trang quản lý
        redirect('/admin/manage');
    }

}
