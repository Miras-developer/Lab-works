<?php
$name = htmlspecialchars($_GET['username']);
$age = (int)$_GET['age'];
echo "Привет, $name. Тебе $age лет.";
?>