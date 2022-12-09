<?php
    require_once "config.php";

    if (isset($_POST["login"], $_POST["password"])) {

        $email = $_POST['login'];

        $query = $pdo->prepare("SELECT * FROM `user` WHERE `email` = '$email'");
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            if (password_verify($_POST['password'], $row['pass'])) {
                $_SESSION["id"] = $row["id"];
                $user = $row;

                header('Location: ../lk.php');
            } else {
                $_SESSION['massage'] = 'Пароль не правильный!';
            };
        } else {
            $_SESSION['massage'] = 'Пользователь не найден!';
        };
    };
    header('Location: ../login.php');
?>

