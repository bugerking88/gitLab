<?php

$x = "ABC";
$y = "AB";
if ($x >= $y)//ABC>=AB
	echo "$x >= $y";
else
	echo "$x < $y";

echo "<hr>";


$x = "ABC";
$y = "BA";
if ($x >= $y)//印 else //ABC < BA
	echo "$x >= $y";
else
	echo "$x < $y";

echo "<hr>";


$x = "123";
$y = "12";
if ($x >= $y)//123 >= 12
	echo "$x >= $y";
else
	echo "$x < $y";

echo "<hr>";

$x = "123";
$y = "21";
if ($x >= $y)//123 >= 21
	echo "$x >= $y";
else
	echo "$x < $y";

echo "<hr>";
		
		
?>