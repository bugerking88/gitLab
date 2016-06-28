<?php
$result = '';
function glue ($val)
{
	global $result;//呼叫到函示外面的$result
	$result .= $val;
}
$array = array ('a', 'b', 'c', 'd');
array_walk ($array, 'glue');//也可傳入方法
echo $result;
?>