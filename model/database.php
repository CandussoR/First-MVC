<?php
    include('db_config.php');

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error = "Database Error : ";
        // Adds the mysql database error message ?
        $error .= $e->getMessage();
        include('view/error.php');
        exit();
    }