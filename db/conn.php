<?php 
    // Development Connection
    // $host = '127.0.0.1';
    // $db = 'junior_test';
    // $user = 'root';
    // $pass = '';

    // Hosting connection
    $host = 'localhost';
    $db = 'id19963475_junior_test';
    $user = 'id19963475_nikavevere';
    $pass = 'vL2yG!5U_ivBzIOB';




    $dsn = "mysql:host=$host;dbname=$db";

    try{
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e) {
        throw new PDOException($e->getMessage());
    }

    require_once 'crud.php';
    $crud = new crud($pdo);
?>