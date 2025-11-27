<?php
$str = "Программирование на PHP";
echo "Длина строки: " . strlen($str) . "<br>";
echo "В верхнем регистре: " . strtoupper($str) . "<br>";
echo "В нижнем регистре: " . strtolower($str) . "<br>";

$numbers = [5, 12, 8, 3];
echo "Максимум: " . max($numbers) . "<br>";
echo "Минимум: " . min($numbers) . "<br>";
echo "Сумма элементов: " . array_sum($numbers);
?>
