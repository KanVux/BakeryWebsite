<?php
namespace App\Controllers;

use App\Models\User;

class UserController extends Controller
{
    // Thêm người dùng
    public function addUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'acc_type' => $_POST['acc_type'] ?? 0 // 0 là người dùng bình thường, 1 là admin
            ];

            $user = new User(PDO());
            $user->add($data); // Lưu người dùng vào cơ sở dữ liệu

            redirect('/admin/users');
        }

        // Render form thêm người dùng
        $this->renderPage('admin/addUser');
    }

    // Chỉnh sửa người dùng
    public function editUser($userId)
    {
        $user = new User(PDO());
        $user = $user->findById($userId);

        if (!$user) {
            redirect('/admin/users');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'] ?? $user->password, // Nếu không có password mới, giữ nguyên password cũ
                'acc_type' => $_POST['acc_type']
            ];

            $user->edit($data); // Cập nhật người dùng vào cơ sở dữ liệu

            redirect('/admin/users');
        }

        $this->renderPage('admin/editUser', ['user' => $user]);
    }

    // Xóa người dùng
    public function deleteUser($userId)
    {
        $user = new User(PDO());
        $user = $user->findById($userId);

        if ($user) {
            $user->delete(); // Xóa người dùng khỏi cơ sở dữ liệu
        }

        redirect('/admin/users');
    }
}
