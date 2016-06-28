<?php

$bloodType = array("A", "B", "AB", "O");
$bloodType[3]="xy";//會蓋掉"o"
for ($i = 0; $i <= 3; $i++) {
	echo $bloodType[$i] . "<br />";
}

?>
