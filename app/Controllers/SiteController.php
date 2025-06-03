<?php

namespace App\Controllers;
use Models\Page;

class SiteController
{
    public function home(): void
    {
        $pages = Page::orderBy('created_at', 'desc')->get();
        $user = $_SESSION['user'] ?? null;

        view('site/home', [
            'pages' => $pages,
            'user' => $user
        ]);
    }
}
