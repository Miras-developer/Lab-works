<?php
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

echo "<h3>Вы на странице № $page</h3>";

for ($i = 1; $i <= 5; $i++) {
    echo "<a href='?page=$i'>Страница $i</a> ";
}
?>
