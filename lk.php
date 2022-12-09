<?php
    require_once("include/config.php");
    if (!$user) header("Location: /login.php");
    if ($user["type"] == "teacher") header("Location: /teacher_lk.php");
    else if ($user["type"] == "admin") header("Location: /admin_lk.php");
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
            <a href="/logout.php">Выход</a>
        </div>
    </header>
    <main>
        <div class="lk">  
            <p class="name"><?php echo($user['fio']);?></p>
            <p><?php echo($user['email']); ?></p>
        </div>

        
            <?php
                $zayavki = $pdo->query("SELECT * FROM `zayavka` WHERE `dostup` = 1 and `id_user` = ".$user["id"])->fetchAll();

                foreach($zayavki as $zayavka) {
                    $kurs = $pdo->query("SELECT * FROM `kurs` WHERE `id_kurs` = ".$zayavka["id_kurs"])->fetch(PDO::FETCH_ASSOC);
                    echo <<< EOT
                    <div class="kurs">
                        <p>{$kurs["name"]}</p>
                        <a class="buttons" href="/materials.php?id={$zayavka["id_kurs"]}">
                            <button class="materials">Доступные материалы</button>
                        </a>
                    </div>
                    EOT;
                };
            ?>
            <?php
                $zayavki = $pdo->query("SELECT * FROM `zayavka` WHERE `dostup` = 0 and `id_user` = ".$user["id"])->fetchAll();

                foreach($zayavki as $zayavka) {
                    $kurs = $pdo->query("SELECT * FROM `kurs` WHERE `id_kurs` = ".$zayavka["id_kurs"])->fetch(PDO::FETCH_ASSOC);
                    echo <<< EOT
                    <div class="kurs" >
                        <p>{$kurs["name"]}</p>
                        <p>(Заявка на рассмотрении)</p>
                        <form action="/include/kurs.php" method="POST">
                            <input type="hidden" name="id" value="{$kurs["id_kurs"]}">
                            <input type="hidden" name="remove" value="1">
                            <button class="otmena"type="submit" value="Отменить заявку">Отменить заявку</button>
                        </form>
                    </div>
                    EOT;
                };
            ?>
    </main>
</body>
</html>
