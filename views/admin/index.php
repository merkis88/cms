<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Панель администратора</title>
</head>
<body>
<h1>Панель администратора</h1>

<p><a href="/public/admin/suggestions">📌 Предложения по исправлениям</a></p>


<p><a href="/public/">⬅️ Назад на сайт</a></p>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Заголовок</th>
        <th>Автор (ID)</th>
        <th>Дата</th>
        <th>Действия</th>
    </tr>
    <?php foreach ($posts as $post): ?>
        <tr>
            <td><?= $post->id ?></td>
            <td><?= htmlspecialchars($post->title) ?></td>
            <td><?= $post->created_by ?></td>
            <td><?= $post->created_at ?></td>
            <td>
                <a href="/public/admin/posts/edit?id=<?= $post->id ?>">✏️</a>
                <a href="/public/admin/posts/delete?id=<?= $post->id ?>" onclick="return confirm('Удалить пост?')">🗑️</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
