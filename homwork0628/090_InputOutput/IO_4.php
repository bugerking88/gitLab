<?php
header("content-type: text/html; charset=utf-8");

$lines = file ( 'data.txt' );//傳入黨名傳出陣列
foreach ( $lines as $line_num => $line ) {
	echo "#<i>$line_num</i> : " . 
		 htmlspecialchars ( $line ) . "<br />\n";//<會變&lt;
}

?> 