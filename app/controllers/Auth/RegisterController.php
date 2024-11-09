<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;

class RegisterController extends Controller
{
    public function __construct()
    {
        if (AUTHGUARD()->isUserLoggedIn()) {
            redirect('/home');
        }

        parent::__construct();
    }

    public function create()
    {   
        $data = [
            'old' => $this->getSavedFormValues(),
            'errors' => session_get_once('errors'),
        ];

        $this->renderPage('auth/register', $data);
    }

    public function store()
    {
        $this->saveFormValues($_POST, ['password', 'password_confirmation']);

        $data = $this->filterUserData($_POST);

        $newUser = new User(PDO());
        $model_errors = $newUser->validate($data);

        if (empty($model_errors)) {
            // Hash the password before saving
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
            $newUser->fill($data)->save();

            $messages = ['success' => 'User has been created successfully.'];
            redirect('/login', ['messages' => $messages]);
        } else {
            // Dữ liệu không hợp lệ...
            redirect('/register', ['errors' => $model_errors]);
        }
    }

    protected function filterUserData(array $data)
    {
        return [
            'name' => $data['name'] ?? null,
            'email' => filter_var($data['email'], FILTER_VALIDATE_EMAIL),
            'password' => $data['password'] ?? '',
            'password_confirmation' => $data['password_confirmation'] ?? '',
            'address' => $data['address'] ?? ''
        ];
    }
}
