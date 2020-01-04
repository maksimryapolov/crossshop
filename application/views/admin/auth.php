<? if(isset($result)):?>
    <ul>
        <? foreach ($result as $item): ?>
            <li>
                <?= $item?>
            </li>
        <? endforeach; ?>
    </ul>
<? endif; ?>
<form action="/auth/" method="post">
    <label>Логин:
        <input autocomplete="off" required name="login" type="text">
    </label>
    <label>Пароль:
        <input autocomplete="off" required name="password" type="password">
    </label>
    <label>
        <button name="submit" value="Отправить">
            Отправить
        </button>
    </label>
</form>