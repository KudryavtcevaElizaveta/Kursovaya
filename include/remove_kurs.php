<?php
    require_once "config.php";

    if (!$user) header("Location: /login.php");
    if ($user["type"] == "user") header("Location: /");

    if (isset($_POST["id"])) {
        $id_kurs = $_POST["id"];
        $pdo->query("DELETE FROM `kurs` WHERE `id_kurs` = $id_kurs");
    };

    header("Location: ../teacher_kurs.php");
?>

