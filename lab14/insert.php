<?php
require 'db.php';

function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

$fullname = trim($_POST['fullname'] ?? '');
$email = trim($_POST['email'] ?? '');
$group_name = trim($_POST['group_name'] ?? '');

if ($fullname === '' || $email === '') {
    die('Ошибка: заполните обязательные поля ФИО и Email.');
}

if (!validate_email($email)) {
    die('Ошибка: некорректный email.');
}

try {
    $stmt = $pdo->prepare("INSERT INTO students (fullname, email, group_name) VALUES (:fullname, :email, :group_name)");
    $stmt->execute(['fullname' => $fullname, 'email' => $email, 'group_name' => $group_name]);
    echo 'Студент успешно добавлен!<br>';
    echo '<a href="list.php">Посмотреть список</a>';
} catch (PDOException $e) {
    die('Ошибка при вставке: ' . $e->getMessage());
}
?>
