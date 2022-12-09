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
        <form action="include/signup.php" method="post" enctype="multipart/form-data">
            <div class="text-field text-field_floating-3">
                <input class="text-field__input" type="name" id="fio" name="fio" placeholder=" ">
                <label class="text-field__label" for="fio">ФИО</label>
            </div>
            <div class="text-field text-field_floating-3">
                <input class="text-field__input"  maxlength="11" name="number" placeholder=" ">
                <label class="text-field__label" for="number">Телефон</label>
            </div>
            <div class="text-field text-field_floating-3">
                <input class="text-field__input" type="email" id="email" name="email" placeholder=" ">
                <label class="text-field__label" for="email">Почта</label>
            </div>
            <div class="text-field text-field_floating-3">
                <input class="text-field__input" type="password" id="password" name="password" placeholder=" ">
                <label class="text-field__label" for="password">Пароль</label>
            </div>
            <div class="text-field text-field_floating-3">
                <input class="text-field__input" type="password" id="password_r" name="password_r" placeholder=" ">
                <label class="text-field__label" for="password_r">Повторите пароль</label>
            </div>
            <button type="submit">Регистрация</button>
        </form>
    </main>
</body>
</html>



