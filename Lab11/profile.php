<?php
if (isset($_GET['name']) && isset($_GET['city'])) {

    $name = htmlspecialchars($_GET['name']);
    $city = htmlspecialchars($_GET['city']);

    echo "Привет, <b>$name</b>! Добро пожаловать из города <b>$city</b>.<br><br>";

    if (!empty($_SERVER['HTTP_REFERER'])) {
        echo "<a href='" . $_SERVER['HTTP_REFERER'] . "'>Вернуться назад</a>";
    }

} else {
    echo "Передайте name и city в URL!";
}
?>
