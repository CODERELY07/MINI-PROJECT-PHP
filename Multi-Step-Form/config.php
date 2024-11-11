<?php

    $localhost = "localhost";
    $servername = "root";
    $password = "nonoy12345";
    $db = "student_management_system";

    $dsn = "mysql:localhost=$localhost;dbname=$db;charset-UTF8";
    try{
        $pdo = new PDO($dsn, $servername, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected Successfully!";
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }