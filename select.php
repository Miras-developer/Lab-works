<?php
$host = "localhost";
$user = "test";
$pass = "Aa1234";
$db = "test_db";
$port = 3307;

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;port=$port;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}

try {
    $query = $pdo->query("SELECT * FROM users");

    echo "<h2>Таблица users:</h2>";
    echo "<table border='1' cellpadding='8'>";
    echo "<tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Registered_at</th>
          </tr>";

    foreach ($query as $row) {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['registered_at']."</td>";
        echo "</tr>";
    }

    echo "</table>";
} catch (PDOException $e) {
    die("Ошибка запроса: " . $e->getMessage());
}
