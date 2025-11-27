<?php
session_start();
if (!isset($_SESSION['auth'])) {
    echo "Доступ запрещён!";
    exit;
}
echo "Добро пожаловать!<br>";
echo '<a href="logout.php">Выйти</a>';
?>
