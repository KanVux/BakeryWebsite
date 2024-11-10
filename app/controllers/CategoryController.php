<?php 
namespace App\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    // Thêm danh mục
    public function addCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'category_name' => $_POST['category_name']
            ];

            $category = new Category(PDO());
            $category->add($data); // Lưu danh mục vào cơ sở dữ liệu

            redirect('/admin/category');
        }

        // Render form thêm danh mục
        $this->renderPage('admin/addCategory');
    }

    // Chỉnh sửa danh mục
    public function editCategory($categoryId)
    {
        $category = new Category(PDO());
        $category = $category->findById($categoryId);

        if (!$category) {
            redirect('/admin/category');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'category_name' => $_POST['category_name']
            ];

            $category->edit($data); // Cập nhật danh mục vào cơ sở dữ liệu

            redirect('/admin/category');
        }

        $this->renderPage('admin/editCategory', ['category' => $category]);
    }

    // Xóa danh mục
    public function deleteCategory($categoryId)
    {
        $category = new Category(PDO());
        $category = $category->findById($categoryId);

        if ($category) {
            $category->delete(); // Xóa danh mục khỏi cơ sở dữ liệu
        }

        redirect('/admin/category');
    }
}
