<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;

class LoginController extends Controller{
    public function create(){
        $title = 'Login';
        if(AUTHGUARD()->isUserLoggedIn()) {
            redirect('/home');
        }
        $data = [
            'messages' => session_get_once('messages'),
            'old' => $this->getSavedFormValues(),
            'errors' => session_get_once('errors'),
            'title' => $title
        ];

        $this->renderPage('auth/login',$data);
    }
    public function store()
    {
        $user_credentials = $this->filterUserCredentials($_POST);
        $errors = [];

        // Tìm người dùng theo email (trả về một mảng hoặc đối tượng)
        $user = (new User(PDO()))->where('email', $user_credentials['email']);

        // Kiểm tra nếu không có người dùng nào được tìm thấy
        if (empty($user)) {
            // Người dùng không tồn tại...  
            $errors['password'] = 'Invalid email or password.';
        } else {
            // Kiểm tra đăng nhập nếu người dùng tồn tại
            if (AUTHGUARD()->login($user, $user_credentials)) {
                if (!AUTHGUARD()->isAdmin()) {
                    redirect('/home');
                }
                redirect('/admin');
            } else {
                // Sai mật khẩu...
                $errors['password'] = 'Invalid email or password.';
            }
        }

        // Đăng nhập không thành công: lưu giá trị trong form, trừ password
        $this->saveFormValues($_POST, ['password']);
        redirect('/login', ['errors' => $errors]);
    }


    public function destroy()
    {
        AUTHGUARD()->logout();
        redirect('/login');
    }

    protected function filterUserCredentials(array $data)
    {
        return [
            'email' => filter_var($data['email'] ?? '', FILTER_VALIDATE_EMAIL),
            'password' => $data['password'] ?? null
        ];
    }
}