<?php

$a = 12;
$b = "34";

$result = $a + $b; // 46
// $result = $a . $b; // 1234 字串串接
$result = $a + intval($b);  // 46 intval 取得變數的整數值

echo $result;

?>