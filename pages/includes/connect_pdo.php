<?php
    $host = 'localhost';
    $db = 'rumm4447_rumahbersinar';
    $user = 'rumm4447';
    $pass = '47svJtJYvDpt21';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset;";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        throw \PDOException($e->getMessage(), $e->getCode());
    }

    session_start();
    date_default_timezone_set('Asia/Jakarta');
?>