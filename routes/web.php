<?php

use Src\Router;
use App\Controllers\AuthController;

$router = new Router();

$router->get('/register', [AuthController::class, 'showRegisterForm']);
$router->post('/register', [AuthController::class, 'register']);
$router->get('/login', [AuthController::class, 'showLoginForm']);
$router->post('/login', [AuthController::class, 'login']);
$router->get('/logout', [AuthController::class, 'logout']);

// Главная страница
$router->get('/', function () {
    if (!isset($_SESSION['user'])) {
        header('Location: /login');
        exit;
    }

    $user = $_SESSION['user'];
    echo "<h1>Добро пожаловать, {$user['name']}!</h1>";
    echo "<p>Ваша роль: {$user['role']}</p>";
    echo "<a href='/logout'>Выйти</a>";
});

// Запуск маршрутизатора
$router->dispatch($_SERVER['REQUEST_URI']);
