<?php

namespace App\Controllers;
use Models\Post;

class AdminController
{
    private function checkAdmin()
    {
        if (!isset($_SESSION['user']) || (int)$_SESSION['user']['RoleID'] !== 1) {
            header('Location: /public/login');
            exit;
        }
    }

    public function postList()
    {
        $this->checkAdmin();
        $posts = Post::orderBy('created_at', 'desc')->get();
        view('admin/index', ['posts' => $posts]);
    }

    public function editPost()
    {
        $this->checkAdmin();
        $id = $_GET['id'] ?? null;
        $post = Post::find($id);

        if (!$post) {
            http_response_code(404);
            echo 'Пост не найден';
            return;
        }

        view('admin/edit', ['post' => $post]);
    }

    public function updatePost()
    {
        $this->checkAdmin();
        $id = $_GET['id'] ?? null;
        $post = Post::find($id);

        if (!$post) {
            http_response_code(404);
            echo 'Пост не найден';
            return;
        }

        $post->update([
            'title' => $_POST['title'] ?? '',
            'content' => $_POST['content'] ?? '',
        ]);

        header('Location: /public/admin');
        exit;
    }

    public function deletePost()
    {
        $this->checkAdmin();
        $id = $_GET['id'] ?? null;

        if ($id) {
            Post::destroy($id);
        }

        header('Location: /public/admin');
        exit;
    }
}
