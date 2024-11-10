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
                'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
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
        $user = $user->where('id', $userId);

        if (!$user) {
            $_SESSION['error'] = 'User not found!';
            redirect('/admin');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'] ?? '',
                'email' => $_POST['email'] ?? '',
                'password' => $_POST['password'] ? password_hash($_POST['password'], PASSWORD_BCRYPT) : $user->password,
                'acc_type' => $_POST['acc_type'] ?? 0,
            ];

            $user->fill($data);
            $user->save();

            $_SESSION['success'] = 'User updated successfully!';
            redirect('/admin');
        }

        $this->renderPage('admin/edit', [
            'user' => $user,
        ]);
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
