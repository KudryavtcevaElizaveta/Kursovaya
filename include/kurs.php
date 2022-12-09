<?php
    require_once "config.php";

    if (!$user) {
        header("Location: /login.php");
        return;
    };

    if (isset($_POST["id"])) {
        $user_id = $user["id"];
        $id_kurs = $_POST["id"];

        if (isset($_POST["remove"])) {
            $pdo->query("DELETE FROM `zayavka` WHERE `id_user` = $user_id and `id_kurs` = $id_kurs");
            header("Location: ../lk.php");
        } else if ($user["type"] == "user") {
            $query = $pdo->prepare("SELECT * FROM `zayavka` WHERE `id_user` = $user_id and `id_kurs` = $id_kurs");
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);

            if (!$row) {
                $pdo->query("INSERT INTO `zayavka` (`id_user`, `id_kurs`) VALUES ($user_id, $id_kurs)");
            };
            header("Location: ../kurs.php");
        };
    };

  
?>