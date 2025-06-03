<?php

use Src\Router;
use App\Controllers\AuthController;
use App\Controllers\SiteController;

$router = new Router();

$router->get('/register', [AuthController::class, 'showRegisterForm']);
$router->post('/register', [AuthController::class, 'register']);

$router->get('/login', [AuthController::class, 'showLoginForm']);
$router->post('/login', [AuthController::class, 'login']);

$router->get('/logout', [AuthController::class, 'logout']);


$router->get('/', [SiteController::class, 'home']);


$router->dispatch($_SERVER['REQUEST_URI']);
