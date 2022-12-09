<?php
    require_once "include/config.php";
    if (!$user) header("Location: /login.php");
    if ($user["type"] == "user") header("Location: /");

    if (!isset($_POST["id"]) && !isset($_GET["id"])) header("Location: /lk.php");

    $id = -1;
    if (isset($_POST["id"])) $id = $_POST["id"];
    else $id = $_GET["id"];

    $kurs = $pdo->query("SELECT * FROM `kurs` WHERE `id_kurs` = $id")->fetch(PDO::FETCH_ASSOC);

    if (!$kurs) header("Location: /lk.php");
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

    <main class="input_form" style="height: 60vh">
        <form class="add_kurs" action="/include/edit_kurs.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo($kurs["id_kurs"]); ?>">
            <div class="text-field text-field_floating-3">
                <input class="text-field__input" type="text" id="name" name="name" placeholder="Название" value="<?php echo($kurs["name"]); ?>" required>
                <label class="text-field__label" for="name">Название</label>
            </div>
            <div class="text-field text-field_floating-3">
                <input class="text-field__input" type="number" id="cost" name="cost" placeholder="Цена" value="<?php echo($kurs["cost"]); ?>" required>
                <label class="text-field__label" for="cost">Цена</label>
            </div>
            <textarea name="opisanije" id="opisanije" rows="10" placeholder="Описание" required><?php echo($kurs["opisanije"]); ?></textarea>
            <button type="submit" class="in">Сохранить</button>

            
        </form>
        <?php
                if (isset($_SESSION['massage'])) {
                    if ($_SESSION['massage']) echo '<p class="msg">' . $_SESSION['massage'] . '</p>';
                };
                unset($_SESSION['massage']);
            ?>
    </main>
</body>
</html>





