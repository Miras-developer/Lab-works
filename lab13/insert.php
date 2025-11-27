<?php
require "connect.php";

try {
    $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
    $stmt->execute(["Damir", "damir@example.com"]);

    echo "Пользователь успешно добавлен.";
} catch (PDOException $e) {
    die("Ошибка: " . $e->getMessage());
}
