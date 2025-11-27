<?php
session_start();
$login = $_POST['login'];
$password = $_POST['password'];
if ($login === 'admin' && $password === '1234') {
    $_SESSION['auth'] = true;
    header('Location: profile.php');
} else {
    echo "Неверные данные!";
}
?>
