<?php
    require_once "config.php";

    if (!$user) header("Location: /login.php");
    if ($user["type"] == "user") header("Location: /");
    if (!isset($_POST["id"])) header("Location: /lk.php");

    $id_kurs = $_POST["id"];

    $kurs = $pdo->query("SELECT * FROM `kurs` WHERE `id_kurs` = $id_kurs")->fetch(PDO::FETCH_ASSOC);

    if (!$kurs) header("Location: /lk.php");

    if (isset($_POST["name"], $_POST["cost"], $_POST["opisanije"])) {
        $name = $_POST["name"];
        $cost = $_POST["cost"];
        $opisanije = $_POST["opisanije"];

        $id_teacher = $kurs["id_teacher"];
        if (isset($_POST["id_teacher"])) $id_teacher = $_POST["id_teacher"];

        $pdo->query("UPDATE `kurs` SET `name` = '$name', `cost` = $cost, `opisanije` = '$opisanije', `id_teacher` = $id_teacher WHERE `id_kurs` = $id_kurs");
    } else {
        $_SESSION['massage'] = 'Заполните все поля!';
        header("Location: ../edit_kurs.php?id=".$_POST["id"]);
    };

    $_SESSION['massage'] = 'Данные курса успешно обновлены!';

    header("Location: ../edit_kurs.php?id=".$_POST["id"]);
?>