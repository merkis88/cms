<?php

namespace App\Controllers;
use Models\User;
use Models\Post;

class AdminController
{
    private function checkAdmin() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['RoleID'] !== 1) {
            header ('location: public/login');
            exit;
        }
    }

    public function postList() {
        $this->checkAdmin();
        $posts = Post::orderBy('created_at', 'desc')->get();
        view('admin/', ['posts' => $posts]);
    }

    public function editPost() {
        $this->checkAdmin();
        $id = $_GET['id'];
        $post = Post::find($id);
        view('admin/edit', ['post' => $post]);
    }

    public function deletePost() {
        $this->checkAdmin();
        $id = $_GET['id'];
        Post::destroy($id);
        header('location: admin/index');
        exit;
    }

    public function updatePost() {
        $this->checkAdmin();
        $id = $_GET['id'];

        $post = Post::find($id);
        $post ->update([
            'title' => $_POST['title'],
            'content' => $_POST['content'],
        ]);

        header('location: admin/index');
        exit;
    }
}