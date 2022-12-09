<?php
    require_once("include/config.php");

    if (!$user) header("Location: /login.php");
    if (!isset($_GET["id"])) header("Location: /kurs.php");

    $kurs = $pdo->query("SELECT * FROM `kurs` WHERE `id_kurs` = ".$_GET["id"])->fetch(PDO::FETCH_ASSOC);

    if (!$kurs) header("Location: /kurs.php");

    if ($user["type"] == "user") {
        $zayavka = $pdo->query("SELECT * FROM `zayavka` WHERE `id_user` = ".$user["id"]." and `id_kurs` = ".$_GET["id"])->fetch(PDO::FETCH_ASSOC);
        if (!$zayavka) header("Location: /lk.php");
        if (!$zayavka["dostup"]) header("Location: /lk.php");
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
            <a href="/kurs.php">Курсы</a>
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
            if ($user["type"] != "user") {
                $message = "";
                if (isset($_SESSION['massage'])) {
                    if($_SESSION['massage']) $message = '<p class="msg">' . $_SESSION['massage'] . '</p>';
                };
                unset($_SESSION['massage']);

                echo <<< EOT
                <div class="add_m">
                <form action="include/upload.php" method="post" enctype="multipart/form-data" >
                        <input type="hidden" name="id" value="{$kurs["id_kurs"]}">
                        <input class="text-field__input" type="file" id="file" name="file" accept="image/*" required>
                        <button type="submit" id="submit">Добавить материал</button>
                        {$message}
                </form>
                <div class="kurs">
                EOT;
            };
        ?>

    <div class="add_m">
            <?php

            $query = $pdo->prepare('SELECT * FROM `materials` WHERE `id_kurs` = '.$_GET["id"].' ORDER BY `id_material` DESC');
            $query->execute();
            $row = $query->fetchall(PDO::FETCH_ASSOC);
          
            foreach($row as $f){
                echo"
                
                    <a style='margin: 20px;'href='".$f['way']."'download>".$f['name']."</a>\n
                
                    ";
            }
            ?>
    </div>
    </main>
</body>
</html>
