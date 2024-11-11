<?php
namespace App\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        // Lấy danh sách các danh mục
        $category = new Category(PDO());
        $categories = $category->getCategories();  // Hoặc phương thức tương ứng để lấy danh sách category

        // Render trang quản trị với danh sách các danh mục
        $this->renderPage('admin/index', ['categories' => $categories]);
    }

    // Thêm danh mục
    public function addCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'category_id' => $_POST['category_id'],
                'category_name' => $_POST['category_name']
            ];

            // Kiểm tra xem category_id có hợp lệ không
            if (empty($data['category_id'])) {
                $_SESSION['error'] = 'Category ID cannot be empty';
                redirect('/admin');
                return;
            }

            $category = new Category(PDO());
            $category->fill($data);

            // Kiểm tra giá trị category_id sau khi fill
            var_dump($category->category_id); // Xem giá trị sau khi fill

            if ($category->save()) {
                $_SESSION['success'] = 'Category added successfully!';
                redirect('/admin');
            } else {
                $_SESSION['error'] = 'Failed to add category.';
                redirect('/admin');
            }
        }
    }



    // Chỉnh sửa danh mục
    public function editCategory($categoryId)
    {
        // Tìm danh mục theo ID
        $category = new Category(PDO());
        $category = $category->findById($categoryId);

        if (!$category) {
            //redirect('/admin');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form
            $data = [
                'category_name' => $_POST['category_name']
            ];

            // Điền dữ liệu vào đối tượng Category
            $category->fill($data);

            // Cập nhật danh mục vào cơ sở dữ liệu
            if ($category->save()) {
                $_SESSION['success'] = 'Category updated successfully!';
                redirect('/admin');
            } else {
                $_SESSION['error'] = 'Failed to update category.';
                redirect('/admin');
            }
        }
    }


    // Xóa danh mục
    public function deleteCategory($categoryId)
    {
        $category = new Category(PDO());
        $category = $category->findById($categoryId);

        if ($category) {
            $category->delete(); // Xóa danh mục khỏi cơ sở dữ liệu
            $_SESSION['success'] = 'Category deleted successfully!';
        } else {
            $_SESSION['error'] = 'Category not found!';
        }

        redirect('/admin');
    }

}
