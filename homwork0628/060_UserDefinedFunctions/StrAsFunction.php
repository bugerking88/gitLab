<?php

function test($i) {
	return $i + 1;
}

// $x = 1;
// echo test($x);  2

$x = 2;
$p = "test";
echo $p($x);//就是 test(2) 

?>