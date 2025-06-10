<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Предложения по исправлениям</title>
</head>
<body>
<h1>Предложенные исправления</h1>
<p><a href="/public/admin">⬅️ Назад в админку</a></p>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Пост ID</th>
        <th>Пользователь ID</th>
        <th>Фрагмент</th>
        <th>Комментарий</th>
        <th>Дата</th>
        <th>Действия</th>
    </tr>
    <?php foreach ($suggestions as $s): ?>
        <tr>
            <td><?= $s->id ?></td>
            <td><?= $s->post_id ?></td>
            <td><?= $s->user_id ?></td>
            <td><?= htmlspecialchars($s->selected_text) ?></td>
            <td><?= htmlspecialchars($s->comment) ?></td>
            <td><?= $s->created_at ?></td>
            <td>
                <a href="/public/admin/posts/edit?id=<?= $s->post_id ?>">✏️ Перейти</a>
                <a href="/public/admin/suggestions/delete?id=<?= $s->id ?>" onclick="return confirm('Удалить?')">🗑️</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
