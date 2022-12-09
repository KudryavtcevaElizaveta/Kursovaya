<?php
    require_once "include/config.php";

    if ($user) header("Location: /");
?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/css.css">
</head>
<body>
    <header>
        <div class="menu">
            <a href="/index.php">Главная</a>
            <a href="/kurs.php">Курсы</a>
        </div>
    </header>
    <main class="input_form">
        <form action="/include/signin.php" method="post" enctype="multipart/form-data">
            <div class="text-field text-field_floating-3">
                <input class="text-field__input" type="login" id="login" name="login" placeholder=" ">
                <label class="text-field__label" for="login">Логин</label>
            </div>
            <div class="text-field text-field_floating-3">
                <input class="text-field__input" type="password" id="password" name="password" placeholder=" ">
                <label class="text-field__label" for="password">Пароль</label>
            </div>
            <button type="submit" class="in">Вход</button>
            <p>Нет аккаунта? -> <a href="/reg.php">Зарегистрируйтесь </a></p>
        </form>
    </main>
</body>
</html>





