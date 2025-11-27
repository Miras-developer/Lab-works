<?php
session_start();
if (isset($_SESSION['user'])) {
    echo "Пользователь сохранён в сессии.";
} else {
    echo "Данные сессии отсутствуют.";
}
?>
