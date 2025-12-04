<?php
// db.php - подключение к базе через PDO
$host = 'localhost';
$db   = 'lab14';
$user = 'Admin';
$pass = 'p(skS25ocQqb4m(C';
$charset = 'utf8mb4';
$port = 3307;

$dsn = "mysql:host=$host;dbname=$db;port=$port;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    // На боевом сервере не выводите сообщение с деталями
    die('Ошибка подключения: ' . $e->getMessage());
}
?>
