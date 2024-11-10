<?php
namespace App\Controllers;

use App\Models\Product;
use App\Models\Category;
class ProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $product = new Product(PDO());
        $title = 'Products Page';
        $this->renderPage('product/index', [
            'products' => $product->getProducts(['*'], null),
            'title' => $title
        ]);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->filterProductData($_POST);

            if ($_FILES['product_img']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'uploads/';
                $uploadFile = $uploadDir . basename($_FILES['product_img']['name']);
                if (move_uploaded_file($_FILES['product_img']['tmp_name'], $uploadFile)) {
                    $data['product_img'] = basename($_FILES['product_img']['name']);
                } else {
                    $_SESSION['error'] = 'Error moving uploaded file!';
                    redirect('/admin');
                }
            } else {
                $_SESSION['error'] = 'Error uploading file: ' . $_FILES['product_img']['error'];
                redirect('/admin');
            }

            $product = new Product(PDO());
            $product->fill($data);
            $product->save();

            $_SESSION['success'] = 'Product added successfully!';
            redirect('/admin');
        }

        $this->renderPage('admin/addProduct');
    }

    public function filterProductData($data)
    {
        return [
            'product_name' => $data['product_name'] ?? '',
            'price' => $data['price'] ?? 0,
            'product_description' => $data['product_description'] ?? '',
            'product_img' => $data['product_img'] ?? '',
            'category_id' => $data['category_id'] ?? 0,
        ];
    }

    public function editProduct($productId)
    {
        $product = new Product(PDO());
        $product = $product->where('product_id', $productId);

        if (!$product) {
            $_SESSION['error'] = 'Product not found!';
            redirect('/admin');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'product_name' => $_POST['product_name'] ?? '',
                'price' => $_POST['price'] ?? 0,
                'product_description' => $_POST['product_description'] ?? '',
                'category_id' => $_POST['category_id'] ?? 0,
            ];

            if ($_FILES['product_img']['name']) {
                $uploadDir = 'uploads/';
                $uploadFile = $uploadDir . basename($_FILES['product_img']['name']);
                if (move_uploaded_file($_FILES['product_img']['tmp_name'], $uploadFile)) {
                    $data['product_img'] = basename($_FILES['product_img']['name']);
                } else {
                    $_SESSION['error'] = 'Error moving uploaded file!';
                    redirect('/admin');
                }
            }

            $product->fill($data);
            $product->save();

            $_SESSION['success'] = 'Product updated successfully!';
            redirect('/admin');
        }

        $categories = new Category(PDO());
        $categories = $categories->getCategories();

        $this->renderPage('admin/edit', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function deleteProduct($productId)
    {
        $product = new Product(PDO());
        $product = $product->where('product_id', $productId);

        if ($product) {
            $product->delete();
            $_SESSION['success'] = 'Product deleted successfully!';
        } else {
            $_SESSION['error'] = 'Product not found!';
        }

        redirect('/admin');
    }
}