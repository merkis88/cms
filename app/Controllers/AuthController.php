<?php

namespace App\Controllers;
use Models\User;

class AuthController
{
    public function showRegisterForm() {
        view('auth/registration');
    }

    public function register() {
        User::create([
            'email' => $_POST['email'],
            'name' => $_POST['name'],
            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
            'RoleID' => 2,
        ]);

        header('Location: /public/login');
        exit;
    }

    public function showLoginForm() {
        view('auth/login');
    }

    public function login() {
        $user = User::where('email', $_POST['email'])->first();

        echo "<pre>Пользователь из базы:\n";
        print_r($user ? $user->toArray() : 'не найден');

        if ($user && password_verify($_POST['password'], $user['password']))
        {
            $_SESSION['user'] = $user->toArray();
            echo "\n\n✅ Авторизация прошла. Сессия:\n";
            print_r($_SESSION);
        } else {
            echo "\n\n❌ Пароль не подошёл\n";
        }

        exit;
    }


    public function logout() {
        session_unset();
        session_destroy();
        header('Location: /public');
        exit;
    }
}
