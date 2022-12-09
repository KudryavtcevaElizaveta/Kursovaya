<?php
    require_once "config.php";
    if ($user) header('Location: /');
  
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
                    
            $pdo->query("INSERT INTO `user` (`fio`, `number`, `email`, `pass`, `type`) VALUES ('$fio', '$number' ,'$email' , '$password', 'user')");
    
            $user = $pdo->query("SELECT * FROM `user` WHERE `email` = '$email'")->fetch(PDO::FETCH_ASSOC);
            $_SESSION["id"] = $user["id"];
            header('Location: ../lk.php');
            
        } else{
            $_SESSION['massage'] = 'Пароли не совпадают';
            header('Location: ../reg.php');
        };
    } else {
        $_SESSION['massage'] = 'Пользователь уже существует';
        header('Location: ../reg.php');
    };
?>



