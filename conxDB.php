<?php

$host = 'localhost';
$port = 3306;
$dbname = 'entreprise';

$username = 'root';
$password = '';

$dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset=utf8";

try {
    $pdo = new PDO($dsn,$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo 'conn';
} catch (PDOException $e) {
    echo 'Failed' . $e->getMessage();
}
