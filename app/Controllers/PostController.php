<?php

namespace App\Controllers;
use Models\User;
use Models\Post;

class PostController
{
    public function index()
    {
        $posts = User::orderBy('created_at', 'desc')->get();
        $user = $_SESSION['user'] ?? null;

        view('post/index', compact('posts', 'user'));
    }


    public function showContentText() {
        view('post/create');
    }

    public function store() {
        if (!isset($_SESSION['user'])) {
            header('location: public/login');
        }

        Post::create([
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'created_by' => $_SESSION['user']['UserID']
        ]);

        header('location: public/');
    }


}