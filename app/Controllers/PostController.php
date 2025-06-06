<?php

namespace App\Controllers;
use Models\Post;

class PostController
{
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

        header('location: public/posts');
    }


}