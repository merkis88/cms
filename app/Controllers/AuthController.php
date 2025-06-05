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

        header ('location: public/login');
        exit;
    }
    public function showLoginForm() {
        view('auth/login');
    }

    public function login() {
        $user = User::where('email', $_POST['email'])->first();

        if ($user && password_verify($_POST['password'], $user->password)) {
            $_SESSION['user'] = $user->toArray();
        }

        header ('location: /public');
        exit;
    }

    public function logout() {
        session_unset();
        session_destroy();
        header('location: /public');
        exit;
    }
}

