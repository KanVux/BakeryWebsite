<?php

namespace App\Controllers;

use League\Plates\Engine;
class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new Engine(ROOTDIR . 'app/views');
    }

    public function renderPage($page, array $data = [])
    {
        exit($this->view->render($page, $data));
    }
    public function render404()
    {
        http_response_code(404);
        exit($this->view->render('errors/404'));
    }
    protected function getSavedFormValues()
    {
        return session_get_once('form', []);
    }
    protected function saveFormValues(array $data, array $except = [])
    {
        $form = [];
        foreach ($data as $key => $value) {
            if (!in_array($key, $except, true)) {
                $form[$key] = $value;
            }
        }
        $_SESSION['form'] = $form;
    }
}