<?php
$name = $_GET['name'] ?? '';
$safe = basename($name);
$path = "files/" . $safe;

if (file_exists($path)) {
    $content = file_get_contents($path);
    echo "<h3>" . htmlspecialchars($safe) . "</h3>";
    echo "<pre>" . htmlspecialchars($content) . "</pre>";
} else {
    echo "<p>Файл не найден.</p>";
}
?>
