<?php

namespace App\Controllers;

use Models\Suggestion;
use Models\Post;

class SuggestionController
{
    public function store()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /public/login');
            exit;
        }

        Suggestion::create([
            'post_id' => $_POST['post_id'],
            'user_id' => $_SESSION['user']['UserID'],
            'selected_text' => $_POST['selected_text'],
            'comment' => $_POST['comment'],
        ]);

        header('Location: /public/');
        exit;
    }

    public function index()
    {
        if (!isset($_SESSION['user']) || (int)$_SESSION['user']['RoleID'] !== 1) {
            header('Location: /public/login');
            exit;
        }

        $suggestions = Suggestion::orderBy('created_at', 'desc')->get();
        view('admin/suggestions', ['suggestions' => $suggestions]);
    }

    public function delete()
    {
        if (!isset($_SESSION['user']) || (int)$_SESSION['user']['RoleID'] !== 1) {
            header('Location: /public/login');
            exit;
        }

        $id = $_GET['id'] ?? null;

        if ($id) {
            Suggestion::destroy($id);
        }

        header('Location: /public/admin/suggestions');
        exit;
    }
}
