<?php
function factorial($n) {
    if ($n < 0) return "Ошибка: число отрицательное!";
    if ($n <= 1) return 1;
    return $n * factorial($n - 1);
}
echo "Факториал 5 равен: " . factorial(5);
?>
