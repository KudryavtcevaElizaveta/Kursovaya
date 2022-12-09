<?php
    require_once("config.php");
    if (!$user) header("Location: /login.php");
    if (!isset($_POST["id"]) || $user["type"] == "user") header("Location: /");

    $kurs_id = $_POST["id"];

    $kurs = $pdo->query("SELECT * FROM `kurs` WHERE `id_kurs` = $kurs_id")->fetch(PDO::FETCH_ASSOC);
    if (!$kurs) header("Location: ../teacher_kurs.php");

    $path = '/materials/' . time() . $_FILES['file']['name'];
    if(move_uploaded_file($_FILES['file']['tmp_name'],'../' . $path)){

        //echo "file was uploaded to serever"."<br>";
        //echo "характеристики:"."<br>";
        //echo $_FILES['file']['size'] . '<br>';//в байтах 
        //echo $_FILES['file']['name'] . '<br>';//имя файл
        //echo $_FILES['file']['size'] . '<br>';//имя во временном хранилище

        $name = $_FILES['file']['name'];
        $pdo->query("INSERT INTO `materials` (`id_kurs`, `name`, `way`) VALUES ('$kurs_id', '$name','$path')");

        $_SESSION['massage'] = 'Материал добавлен';
    }else{
        $_SESSION['massage'] = 'Ошибка при загрузке изображения';
    };
    // $_SESSION['file'] = $_FILES['file']['name'];
    header('Location: ../materials.php?id='.$kurs_id);
?>





