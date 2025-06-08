<?php

namespace App\Controllers;

use Models\Page;
use Models\Post;

class SiteController
{
    public function home(): void
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        $user = $_SESSION['user'] ?? null;

        view('site/home', [
            'posts' => $posts,
            'user' => $user
        ]);
    }
}
