<?php
namespace App\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $users = (new User(PDO()))->getUsers(['*'], null);
        $this->renderPage('admin/index', [
            'users' => $users,
        ]);
    }

    public function addUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'address' => $_POST['address'],
                'acc_type' => $_POST['acc_type'] ?? 0,
            ];

            $user = new User(PDO());
            $user->fill($data);
            $user->save();

            $_SESSION['success'] = 'User added successfully!';
            redirect('/admin');
        }
    }

    public function editUser($userId)
    {
        $user = new User(PDO());
        $user = $user->find($userId);

        if (!$user) {
            $_SESSION['error'] = 'User not found!';
            redirect('/admin');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'] ?? '',
                'email' => $_POST['email'] ?? '',
                'acc_type' => $_POST['acc_type'] ?? 0
            ];

            if (!empty($_POST['old_password'])) {
                if (!password_verify($_POST['old_password'], $user->password)) {
                    $_SESSION['error'] = 'Mật khẩu cũ không đúng!';
                    redirect("/admin");
                }
            }

            if (!empty($_POST['password'])) {
                $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            }

            $user->fill($data);
            $user->save();

            $_SESSION['success'] = 'User updated successfully!';
            redirect('/admin');
        }

        $this->renderPage('admin/index', ['user' => $user]);
    }


    public function deleteUser($userId)
    {
        $user = new User(PDO());
        $user = $user->where('id', $userId);

        if ($user) {
            $user->delete();
            $_SESSION['success'] = 'User deleted successfully!';
        } else {
            $_SESSION['error'] = 'User not found!';
        }

        redirect('/admin');
    }
}
