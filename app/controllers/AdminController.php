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
        $this->renderPage('admin/index', ['product' => $product]);
    }

    public function delete($id)
    {
        // Xóa dữ liệu
        (new Product(PDO()))->delete($id);

        // Sau khi xóa, quay lại trang quản lý
        redirect('/admin/manage');
    }
    public function addProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form
            $productData = [
                'product_name' => $_POST['product_name'],
                'price' => $_POST['price'],
                'product_img' => $_FILES['product_img']['name'],
                'category_id' => $_POST['category_id']
            ];

            // Kiểm tra tính hợp lệ của dữ liệu
            // Cần kiểm tra tính hợp lệ của dữ liệu (ví dụ: tên sản phẩm, giá cả, ảnh, danh mục)

            // Xử lý ảnh tải lên
            $uploadDir = 'uploads/';
            $uploadFile = $uploadDir . basename($_FILES['product_img']['name']);
            move_uploaded_file($_FILES['product_img']['tmp_name'], $uploadFile);

            // Thêm sản phẩm vào cơ sở dữ liệu
            $product = new Product(PDO());
            $product->fill($productData);
            $product->save();

            // Sau khi thêm thành công, chuyển hướng về danh sách sản phẩm
            redirect('/admin');
        }

        // Render trang thêm sản phẩm
        $categories = (new Category(PDO()))->getCategories();
        $this->renderPage('admin/addProduct', ['categories' => $categories]);
    }

}
