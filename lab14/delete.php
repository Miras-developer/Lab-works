<?php
require 'db.php';
if (!isset($_POST['id'])) {
    die('Нет id');
}
$id = (int) $_POST['id'];
$st = $pdo->prepare('DELETE FROM students WHERE id = ?');
$st->execute([$id]);
header('Location: list.php');
?>
