<?php
// session_start();

function connection(): PDO {
    $host = 'localhost';
    $db   = 'simple_database';
    $user = 'simple_user';
    $pass = 'simple-password';
    $port = '5432';

    $pdo = null;

    if($pdo instanceof PDO) {
        return $pdo;
    }

    $pdo = new PDO(
        "pgsql:host={$host};port={$port};dbname={$db}", 
        $user, $pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );

    return $pdo;
}


?>