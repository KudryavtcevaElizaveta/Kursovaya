<?php
    require_once("include/config.php");
    if (!$user) header("Location: /login.php");
    if ($user["type"] == "user") header("Location: /");
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
            <a href="/teacher_lk.php">Личный кабинет</a>
            <a href="/logout.php">Выход</a>
        </div>
    </header>

    <main>

        <?php
            if ($user["type"] == "admin") $kurses = $pdo->query("SELECT * FROM `kurs`")->fetchAll();
            else $kurses = $pdo->query("SELECT * FROM `kurs` WHERE `id_teacher` = ".$user["id"])->fetchAll();

            foreach($kurses as $kurs) {
                if ($user["type"] == "admin"){
                    echo <<< EOT
                    <div class="kurs" >
                        <h2>{$kurs["name"]}</h2>
                        <p>Цена: <b>{$kurs["cost"]}</b></p>
                        <p>Описание: {$kurs["opisanije"]}</p>
                        <div style="display: flex; flex-direction: column">
                        
                        <form class="buttons" action="/zayavki.php">
                            <input type="hidden" name="id" value="{$kurs["id_kurs"]}">
                            <button class="materials" type="submit">Заявки на курс</button>
                        </form>
                      
                        <form class="buttons" action="/edit_kurs.php?id={$kurs["id_kurs"]}" method="POST">
                            <input type="hidden" name="id" value="{$kurs["id_kurs"]}">
                            <button class="otmena" type="submit">Редактировать курс</button>
                        </form>
                        <form class="buttons" action="/include/remove_kurs.php" method="POST">
                            <input type="hidden" name="id" value="{$kurs["id_kurs"]}">
                            <button class="otmena" type="submit">Удалить курс</button>
                        </form>
                      
                        </div>
                    </div>
                    EOT;
                }else{
                    echo <<< EOT
                    <div class="kurs" >
                        <h2>{$kurs["name"]}</h2>
                        <p>Цена: <b>{$kurs["cost"]}</b></p>
                        <p>Описание: {$kurs["opisanije"]}</p>
                        <div style="display: flex; flex-direction: row">
                        <div style="padding:15px;">
                        <a class="buttons" href="/materials.php?id={$kurs["id_kurs"]}">
                            <button class="materials">Добавить материалы</button>
                        </a>
                        
                        <form class="buttons" action="/zayavki.php">
                            <input type="hidden" name="id" value="{$kurs["id_kurs"]}">
                            <button class="materials" type="submit">Заявки на курс</button>
                        </form>
                        </div>
                        <div style="padding:15px;">
                        <form class="buttons" action="/edit_kurs.php?id={$kurs["id_kurs"]}" method="POST">
                            <input type="hidden" name="id" value="{$kurs["id_kurs"]}">
                            <button class="otmena" type="submit">Редактировать курс</button>
                        </form>
                        <form class="buttons" action="/include/remove_kurs.php" method="POST">
                            <input type="hidden" name="id" value="{$kurs["id_kurs"]}">
                            <button class="otmena" type="submit">Удалить курс</button>
                        </form>
                        </div>
                        </div>
                    </div>
                    EOT;
                }
                
            };
        ?>

    </main>
</body>
</html>
