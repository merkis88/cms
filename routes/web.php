<?php

use Src\Router;
use App\Controllers\AuthController;
use App\Controllers\SiteController;
use App\Controllers\PostController;

$router = new Router();

$router->get('/register', [AuthController::class, 'showRegisterForm']);
$router->post('/register', [AuthController::class, 'register']);

$router->get('/login', [AuthController::class, 'showLoginForm']);
$router->post('/login', [AuthController::class, 'login']);

$router->get('/logout', [AuthController::class, 'logout']);


$router->get('/', [SiteController::class, 'home']);

$router->get('/create', [PostController::class, 'showContentText']);
$router->post('/store', [PostController::class, 'store']);



$router->dispatch($_SERVER['REQUEST_URI']);
