<?php
function sum($a, $b, $showResult = true) {
    $result = $a + $b;
    if ($showResult) echo "Результат: $result<br>";
    return $result;
}
sum(5, 7);
?>
