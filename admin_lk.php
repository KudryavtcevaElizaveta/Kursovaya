<?php
    require_once("include/config.php");
    if (!$user) header("Location: /login.php");
    if ($user["type"] != "admin") header("Location: /");
?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/css.css">
    <script src="js/hidden.js"></script>
</head>

<body>
    <header>
        <div class="menu">
            <a href="/index.php">Главная</a>
            <a href="/kurs.php">Курсы</a>
            <a href="/logout.php">Выход</a>
        </div>
    </header>

    <main class="input_form" >
        <form  class="add_kurs" action="include/add_teacher.php" method="post" enctype="multipart/form-data">
        <p>Добавление учителя</p>

            <div class="text-field text-field_floating-3">
                <input class="text-field__input" type="fio" id="name" name="fio" placeholder="alexander@itchief.ru" required>
                <label class="text-field__label" for="fio">Имя</label>
            </div>
            <div class="text-field text-field_floating-3">
                <input class="text-field__input" type="email" id="email" name="email" placeholder="alexander@itchief.ru" required>
                <label class="text-field__label" for="email">Почта</label>
            </div>
            <div class="text-field text-field_floating-3">
                <input class="text-field__input" type="name" id="password" name="number" placeholder="alexander@itchief.ru" required>
                <label class="text-field__label" for="number">Номер</label>
            </div>

            <div class="text-field text-field_floating-3">
                <input class="text-field__input" type="password" id="password" name="password" placeholder="alexander@itchief.ru" required>
                <label class="text-field__label" for="password">Пароль</label>
            </div>
          

            <div class="text-field text-field_floating-3">
                <input class="text-field__input" type="password" id="password_r" name="password_r" placeholder="alexander@itchief.ru" required>
                <label class="text-field__label" for="password_r">Повторите пароль</label>
            </div>

            <button type="submit">Регистрация учителя</button>
            
            <?php
                if (isset($_SESSION['massage'])) {
                    if ($_SESSION['massage']) echo '<p class="msg">' . $_SESSION['massage'] . '</p>';
                };
                unset($_SESSION['massage']);
            ?>
       
    </main>
</body>
</html>
