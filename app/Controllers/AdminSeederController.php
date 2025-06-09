<?php

namespace App\Controllers;

use Models\User;

class AdminSeederController
{
    public function createAdmin(): void
    {
        $existing = User::where('email', 'admin@gmail.com')->first();

        if ($existing) {
            echo 'Админ уже существует';
            return;
        }

        User::create([
            'email' => 'admin@gmail.com',
            'name' => 'Admin',
            'password' => password_hash('admin', PASSWORD_BCRYPT),
            'RoleID' => 1,
        ]);

        echo 'Админ успешно создан. Логин: admin@gmail.com, пароль: admin';
    }
}
