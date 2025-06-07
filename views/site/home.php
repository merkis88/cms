<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Вход</title>
</head>
<body>
<h1>Добро пожаловать!</h1>

<?php if (!$user): ?>
    <p>Вы гость. <a href="public/register">Регистрация</a> | <a href="public/login">Войти</a></p>
<?php else: ?>
    <p>Привет, <?= htmlspecialchars($user['name']) ?>! <a href="public/logout">Выйти</a></p>
    <p><a href="public/create">✏️ Написать пост</a></p>
<?php endif; ?>

<hr>

<h2>Страницы:</h2>
<?php foreach ($pages as $page): ?>
    <div style="margin-bottom: 1em">
        <h3><?= htmlspecialchars($page->title) ?></h3>
        <p><?= nl2br(htmlspecialchars($page->content)) ?></p>
        <small>Slug: <?= $page->slug ?> | Создано: <?= $page->created_at ?></small>
    </div>
<?php endforeach; ?>

<hr>

<h2>Посты пользователей:</h2>
<?php foreach ($posts as $post): ?>
    <div style="margin-bottom: 1em; border: 1px solid #ccc; padding: 10px;">
        <h3><?= htmlspecialchars($post->title) ?></h3>
        <p><?= nl2br(htmlspecialchars($post->content)) ?></p>
        <small>Создано: <?= $post->created_at ?></small>
    </div>
<?php endforeach; ?>

</body>
</html>
