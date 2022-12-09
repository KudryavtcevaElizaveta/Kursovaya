<?php
    require_once "config.php";

    if (!$user) header("Location: /login.php");
    if ($user["type"] == "user") header("Location: /");
    if (!isset($_POST["id"])) header("Location: /lk.php");

    if (isset($_POST["name"], $_POST["cost"], $_POST["opisanije"], $_POST["id_teacher"])) {
        $name = $_POST["name"];
        $cost = $_POST["cost"];
        $opisanije = $_POST["opisanije"];
        $id_teacher = $_POST["id_teacher"];

        $pdo->query("INSERT INTO `kurs` (`name`, `cost`, `opisanije`, `id_teacher`) VALUES ('$name', $cost, '$opisanije', $id_teacher)");
        $_SESSION['massage'] = 'Курс успешно добавлен!';
    } else {
        $_SESSION['massage'] = 'Заполните все поля!';
    };

    header("Location: ../teacher_lk.php");
?>


