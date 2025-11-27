<?php
$login = htmlspecialchars($_POST['login']);
$pass = htmlspecialchars($_POST['password']);
echo "Добро пожаловать, $login. Ваш пароль: $pass";
?>