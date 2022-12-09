<?php
    session_start();

    define('USER', '19087');
    define('PASSWORD', 'gupmjy');
    define('HOST', 'pma.web.edu');
    define('DATABASE', '19087_kurs');

    try {
        $pdo = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    };

    $user = null;
    if (isset($_SESSION["id"])) {
        $user = $pdo->query("SELECT * FROM `user` WHERE `id` = ".$_SESSION["id"])->fetch(PDO::FETCH_ASSOC);
        if (!$user) unset($_SESSION["id"]);
    };
?>


