<?php
    require_once "config.php";

    if (!isset($_POST["id"])) header("Location: /kurs.php");
    if ($user) {
        if ($user["type"] == "user") header("Location: /kurs.php");
    } else {
        header("Location: /login.php");
        return;
    };
    $id_kurs = $_POST["id"];

    $kurs = $pdo->query("SELECT * FROM `kurs` WHERE `id_kurs` = $id_kurs")->fetch(PDO::FETCH_ASSOC);

   if (!$kurs) header("Location: /kurs.php");

    if ($user["type"] == "teacher") {
        if ($kurs["id_teacher"] != $user["id"]) header("Location: /kurs.php");
    };

    if (isset($_POST["id"])) {
        $user_id = $_POST["user"];
        echo  $user_id;
        $pdo->query("UPDATE `zayavka` SET `dostup` = 1 WHERE `id_user` = $user_id and `id_kurs` = $id_kurs");
        header("Location: /zayavki.php?id=".$id_kurs);
    };
?>

