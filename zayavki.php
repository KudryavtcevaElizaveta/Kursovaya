<?php
    require_once("include/config.php");
    if (!isset($_GET["id"])) header("Location: /kurs.php");
    if ($user) {
        if ($user["type"] == "user") header("Location: /kurs.php");
    } else {
        header("Location: /login.php");
    };
    $id_kurs = $_GET["id"];
    $kurs = $pdo->query("SELECT * FROM `kurs` WHERE `id_kurs` = $id_kurs")->fetch(PDO::FETCH_ASSOC);
    if (!$kurs) header("Location: /kurs.php");
    if ($user["type"] == "teacher") {
        if ($kurs["id_teacher"] != $user["id"]) header("Location: /kurs.php");
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
            <a href="/index.php">Главная</a><a href="/teacher_kurs.php">Курсы</a>
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
        $zayavki = $pdo->query("SELECT * FROM `zayavka` WHERE `id_kurs` = ".$kurs["id_kurs"])->fetchAll();

        foreach($zayavki as $zayavka) {
            if ($zayavka["dostup"]) continue;
            $u = $pdo->query("SELECT * FROM `user` WHERE `id` = ".$zayavka["id_user"])->fetch(PDO::FETCH_ASSOC);

            echo <<< EOT
            <div class="kurs">
                <h2>{$u["email"]}</h2>
                <form action="/include/zayavki.php" method="POST">
                    <input type="hidden" name="user" value={$u["id"]}>
                    <input type="hidden" name="id" value="{$kurs["id_kurs"]}">
                    <input type="submit" value="Принять заявку">
                </form>
            </div>
            EOT;
        };
    ?>
    </main>
</body>
</html>                  
