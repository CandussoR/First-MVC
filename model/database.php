<?php
    $dsn = 'mysql:host=localhost;dbname=assignment_tracker';
    $username = 'root';
    $password = 'z1y2w3X4*';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error = "Database Error : ";
        // Adds the mysql database error message ?
        $error .= $e->getMessage();
        include('view/error.php');
        exit();
    }