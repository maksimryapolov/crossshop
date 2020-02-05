<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/dist/css/admin.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
</head>
<body>
    <div class="auth-block">
        <? if(isset($result)):?>
            <ul class="error-list">
                <? foreach ($result as $item): ?>
                    <li>
                        <?= $item?>
                    </li>
                <? endforeach; ?>
            </ul>
        <? endif; ?>
        <form action="/auth/" method="post" class="auth">
            <h1 class="auth-title">Пожалуйста авторизуйтесь</h1>
            <input autocomplete="off" class="auth__input" placeholder="Логин" required name="login" type="text">
            <input autocomplete="off" class="auth__input" placeholder="Пароль" required name="password" type="password">

            <button name="submit" class="btn" value="Отправить">
                Вход
            </button>

        </form>
    </div>
</body>
</html>
