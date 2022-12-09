<?php
    require_once("include/config.php");
    if ($user) {
        if ($user["type"] != "user") header("Location: /teacher_kurs.php");
    };
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
            <?php
                if ($user) {
                    echo('<a href="/lk.php">Личный кабинет</a>');
                    echo('<a href="/logout.php">Выход</a>');
                } else {
                    echo('<a href="/login.php">Вход</a>');
                };
            ?>
        </div>
    </header>
    <main>
    <?php
        $kurses = $pdo->query("SELECT * FROM `kurs`")->fetchAll();
        foreach($kurses as $kurs) {
            if ($user) {
                $k = $pdo->query("SELECT * FROM `zayavka` WHERE `id_user` = ".$user["id"]." and `id_kurs` = ".$kurs["id_kurs"])->fetch(PDO::FETCH_ASSOC);
                if ($k) continue;
            };
            echo "
            <div class='kurs'>
                <h2>{$kurs['name']}</h2>
                <p>Цена: <b>{$kurs['cost']}</b></p>
                <p>Описание: {$kurs['opisanije']}</p>
                <form action='/include/kurs.php'method='POST'>
                    <input type='hidden' name='id' value='{$kurs['id_kurs']}'>
                    <button class='ostavit' type='submit' value='Оставить заявку'>Оставить заявку</button>
                </form>
            </div>"
            ;
        };
    ?>
    </main>
</body>
</html>
