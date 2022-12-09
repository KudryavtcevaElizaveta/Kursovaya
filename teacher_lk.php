<?php
    require_once("include/config.php");
    if (!$user) header("Location: /login.php");
    if ($user["type"] != "teacher") header("Location: /");
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

    <div class="lk">  
                <p class="name"><?php echo($user['fio']);?></p>
                <p><?php echo($user['email']); ?></p>
    </div>
    
    <main class="input_form" style="height: 60vh">
        <form  class="add_kurs" action="/include/add_kurs.php" method="post" enctype="multipart/form-data">
            <p>Добавление круса</p>
        <input type="hidden" name="id_teacher" value="<?php echo($user["id"]); ?>">
            <div class="text-field text-field_floating-3">
                <input class="text-field__input" type="text" id="name" name="name" placeholder="Название" required>
                <label class="text-field__label" for="name">Название</label>
            </div>
            <div class="text-field text-field_floating-3">
                <input class="text-field__input" type="number" id="cost" name="cost" placeholder="Цена" required>
                <label class="text-field__label" for="cost">Цена</label>
            </div>
            <textarea name="opisanije" id="opisanije" rows="8" placeholder="Описание" required></textarea>
            <button type="submit" class="in">Добавить</button>

            <?php
                if (isset($_SESSION['massage'])) {
                    if ($_SESSION['massage']) echo '<p class="msg">' . $_SESSION['massage'] . '</p>';
                };
                unset($_SESSION['massage']);
            ?>
        </form>
    </main>
</body>
</html>
