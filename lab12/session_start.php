<?php
session_start();
$_SESSION['user'] = 'user';
echo "Сессия создана.<br>";
echo "Имя пользователя сохранено.";
?>
