<?php
$bloodType[] = 'A';
$bloodType[] = 'B';
$bloodType[] = 'AB';
$bloodType[] = 'O';
// 陣列是彈性的 $bloodType[5] 就增加為長度6
for ($i = 0; $i <= 3; $i++) {
	echo $bloodType[$i] . "<br />";
}
?>