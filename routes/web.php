<?php

use Src\Router;
use App\Controllers\AuthController;
use App\Controllers\SiteController;
use App\Controllers\PostController;
use App\Controllers\AdminController;
use App\Controllers\AdminSeederController;
use App\Controllers\SuggestionController;

$router = new Router();

$router->get('/register', [AuthController::class, 'showRegisterForm']);
$router->post('/register', [AuthController::class, 'register']);

$router->get('/login', [AuthController::class, 'showLoginForm']);
$router->post('/login', [AuthController::class, 'login']);

$router->get('/logout', [AuthController::class, 'logout']);


$router->get('/', [SiteController::class, 'home']);

$router->get('/create', [PostController::class, 'showContentText']);
$router->post('/store', [PostController::class, 'store']);

$router->get('/admin', [AdminController::class, 'postList']);
$router->get('/admin/posts/edit', [AdminController::class, 'editPost']);
$router->post('/admin/posts/update', [AdminController::class, 'updatePost']);
$router->get('/admin/posts/delete', [AdminController::class, 'deletePost']);
$router->get('/seed-admin', [AdminSeederController::class, 'createAdmin']);

$router->post('/suggestions/store', [SuggestionController::class, 'store']);
$router->get('/admin/suggestions', [SuggestionController::class, 'index']);
$router->get('/admin/suggestions/delete', [SuggestionController::class, 'delete']);


$router->dispatch($_SERVER['REQUEST_URI']);
