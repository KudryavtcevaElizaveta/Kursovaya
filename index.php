<?php
    require_once("include/config.php");
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

    <main class="main_title">
        <div ><h1 class="funny-title section-title">Подготовительные курсы по английскому языку</h1></div>
    </main>


</body>
</html>
