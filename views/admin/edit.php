<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Редактирование поста</title>
</head>
<body>
<h1>Редактирование поста</h1>

<form method="post" action="/public/admin/posts/update?id=<?= $post->id ?>">
    <label>Заголовок:<br>
        <input type="text" name="title" value="<?= htmlspecialchars($post->title) ?>">
    </label><br><br>

    <label>Содержимое:<br>
        <textarea name="content" rows="10" cols="50"><?= htmlspecialchars($post->content) ?></textarea>
    </label><br><br>

    <button type="submit">💾 Сохранить</button>
</form>

<p><a href="/public/admin">⬅️ Назад в админку</a></p>
</body>
</html>
