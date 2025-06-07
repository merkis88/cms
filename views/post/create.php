<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Создание поста</title>
</head>
<body>
<h1>Создать пост</h1>
    <form method="post" action="public/store">
        <label>Заголовок: <input type="text" name="title"></label><br><br>
        <label>Содержимое:</label><br>
        <textarea name="content" rows="10" cols="50"></textarea><br><br>
        <button type="submit">Опубликовать</button>
    </form>
</body>
</html>