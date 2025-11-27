<form method="get" action="">
    <label>Введите поисковый запрос:</label>
    <input type="text" name="q" placeholder="Например: PHP">
    <input type="submit" value="Поиск">
</form>

<?php
if (!empty($_GET['q'])) {
    $query = htmlspecialchars($_GET['q']);
    echo "<p>Результаты поиска по запросу: <b>$query</b></p>";
}
?>
