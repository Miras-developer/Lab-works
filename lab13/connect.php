<?php
$host = "localhost";
$user = "test";
$pass = "Aa1234"; 
$db = "test_db"; 
$port = 3307;

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;port=$port;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Подключение успешно!";
} catch (PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}
