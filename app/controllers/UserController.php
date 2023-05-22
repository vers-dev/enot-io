<?php

namespace App\controllers;

use App\core\App;
use App\core\Auth;
use App\core\Controller;
use App\core\Router;
use App\models\User;

class UserController extends Controller
{
    public function profile()
    {
        return $this->render('pages/profile');
    }

    public function store(): bool
    {
        $validation = $this->validator->validate($this->request->input(), [
            'login' => 'required|min:3|max:32',
            'password' => 'required|min:6',
            're_password' => 'same:password'
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();
            App::$app->session->set('errors', $errors->firstOfAll());
            Router::redirect('/registration');
            return false;
        }

        $validated = $validation->getValidatedData();

        $data = [
            "login" => $validated['login'],
            "password" => password_hash($validated['password'], PASSWORD_BCRYPT)
        ];

        $id = User::query()->create($data);

        Auth::login($id);

        Router::redirect();

        return true;
    }

    public function auth(): bool
    {
        $validation = $this->validator->validate($this->request->input(), [
            'login' => 'required|min:3|max:32',
            'password' => 'required|min:6',
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();
            App::$app->session->set('errors', [$errors->firstOfAll()]);
            Router::redirect('/login');
            return false;
        }

        $validated = $validation->getValidatedData();

        $data = [
            "login" => $validated['login'],
            "password" => password_hash($validated['password'], PASSWORD_BCRYPT)
        ];

        if (!Auth::attempt($data)) {
            return false;
        }

        Router::redirect();

        return true;
    }

    public function logout()
    {
        Auth::logout();

        Router::redirect();
    }

}