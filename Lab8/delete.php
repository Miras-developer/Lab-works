<?php
$name = $_GET['name'] ?? '';
$safe = basename($name);
$path = "files/" . $safe;

if (file_exists($path)) {
    unlink($path);
}

header("Location: index.php");
exit;
?>
