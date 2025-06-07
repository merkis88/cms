<?php

namespace App\Controllers;

use Models\Page;
use Models\Post;

class SiteController
{
    public function home(): void
    {
        $pages = Page::orderBy('created_at', 'desc')->get();
        $posts = Post::orderBy('created_at', 'desc')->get();
        $user = $_SESSION['user'] ?? null;

        view('site/home', [
            'pages' => $pages,
            'posts' => $posts,
            'user' => $user
        ]);
    }
}
