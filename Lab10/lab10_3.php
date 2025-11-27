<?php
function increment(&$value) {
    $value++;
}
$number = 10;
increment($number);
echo "Новое значение: $number";
?>
