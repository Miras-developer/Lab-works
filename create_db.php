<?php
$host = "localhost";
$user = "test";
$pass = "Aa1234";
$port = 3307;
$db = "test_db";

try {
    // Подключение БЕЗ указания базы
    $pdo = new PDO("mysql:host=$host;port=$port;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec("CREATE DATABASE IF NOT EXISTS $db CHARACTER SET utf8 COLLATE utf8_general_ci");

    echo "База данных '$db' создана или уже существует.";
} catch (PDOException $e) {
    die("Ошибка: " . $e->getMessage());
}
