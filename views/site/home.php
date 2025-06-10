<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
</head>
<body>
<h1>Добро пожаловать!</h1>

<?php if (!$user): ?>
    <p>Вы гость. <a href="/public/register">Регистрация</a> | <a href="/public/login">Войти</a></p>
<?php else: ?>
    <p>Привет, <?= htmlspecialchars($user['name']) ?>! <a href="/public/logout">Выйти</a></p>
    <p><a href="/public/create">✏️ Написать пост</a></p>
    <?php if ((int)$user['RoleID'] === 1): ?>
        <p><a href="/public/admin">🛠 Админка</a></p>
    <?php endif; ?>
<?php endif; ?>

<hr>

<h2>Посты пользователей:</h2>
<?php foreach ($posts as $post): ?>
    <div style="margin-bottom: 1em; border: 1px solid #ccc; padding: 10px;">
        <h3><?= htmlspecialchars($post->title) ?></h3>
        <p><?= nl2br(htmlspecialchars($post->content)) ?></p>
        <small>Создано: <?= $post->created_at ?> (автор ID: <?= $post->created_by ?>)</small>

        <?php if ($user && (int)$user['RoleID'] === 2): ?>
            <form method="post" action="/public/suggestions/store" style="margin-top: 1em;">
                <input type="hidden" name="post_id" value="<?= $post->id ?>">

                <label>Фрагмент с ошибкой:<br>
                    <textarea name="selected_text" required rows="2" cols="60"></textarea>
                </label><br>

                <label>Комментарий к ошибке:<br>
                    <textarea name="comment" required rows="2" cols="60"></textarea>
                </label><br>

                <button type="submit">📤 Отправить предложение</button>
            </form>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

</body>
</html>
