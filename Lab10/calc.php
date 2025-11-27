<?php
function add($a, $b) { return $a + $b; }
function sub($a, $b) { return $a - $b; }
function mul($a, $b) { return $a * $b; }
function div($a, $b) {
    if ($b == 0) return "Ошибка: деление на ноль!";
    return $a / $b;
}

$a = $_GET['a'] ?? 10;
$b = $_GET['b'] ?? 5;
$op = $_GET['op'] ?? 'add';

switch ($op) {
    case 'add': echo "Сложение: " . add($a, $b); break;
    case 'sub': echo "Вычитание: " . sub($a, $b); break;
    case 'mul': echo "Умножение: " . mul($a, $b); break;
    case 'div': echo "Деление: " . div($a, $b); break;
    default: echo "Неизвестная операция!";
}
?>
