<?php
    require_once "config.php";

    if (!$user) {
        header('Location: /login.php');
        return;
    };

    if ($user["type"] != "admin") {
        header('Location: /');
        return;
    };

    if (isset($_POST['fio'], $_POST['email'], $_POST['password'], $_POST['password_r'])) {
        $fio = $_POST['fio'];
        $number = $_POST['number'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_r = $_POST['password_r'];

        $query = $pdo->prepare("SELECT * FROM `user` WHERE `email` = '$email'");
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            if ($password === $password_r){
                
                $password = password_hash($password, PASSWORD_DEFAULT);
                        
                $pdo->query("INSERT INTO `user` (`fio`,  `number`, `email`, `pass`, `type`) VALUES ('$fio','$number' ,'$email' , '$password', 'teacher')");
        
                $_SESSION['massage'] = 'Учитель успешно добавлен!';
                header('Location: /admin_lk.php');
            } else{
                $_SESSION['massage'] = 'Пароли не совпадают!';
                header('Location: /admin_lk.php');
            };
        } else {
            $_SESSION['massage'] = 'Пользователь уже существует!';
            header('Location: /admin_lk.php');
        };
    } else {
        $_SESSION['massage'] = 'Заполните все поля!';
        header('Location: /admin_lk.php');
    };
?>