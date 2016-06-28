<?php

$a = array('a1', 'a3', 'a20', 'a15');

natsort($a);//'a1', 'a3', 'a15', 'a20'

//var_dump(natsort($a));
//echo "<br>";

foreach ($a as $k => $x)
{
	echo "$k => $x <br>";
}

?>
