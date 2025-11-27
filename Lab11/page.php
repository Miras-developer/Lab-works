<?php
if (isset($_GET['name']) && isset($_GET['age'])) {

    $name = htmlspecialchars($_GET['name']);
    $age = (int)$_GET['age'];

    echo "<h3>Информация о пользователе</h3>";
    echo "Имя: $name <br>";
    echo "Возраст: $age лет <br>";

} else {
    echo "Параметры не переданы!";
}

echo "<hr>";
echo "Текущий URL: " . $_SERVER['REQUEST_URI'] . "<br>";
echo "Хост: " . $_SERVER['HTTP_HOST'] . "<br>";
echo "Строка запроса: " . $_SERVER['QUERY_STRING'] . "<br>";
?>
