<?php
header("content-type: text/html; charset=utf-8");

$season = array('春', '夏', '秋', '冬'); 

echo "每年的四季分別為：";
foreach ($season as $value){//$season 陣列的每一項  as 帶入 $value
	echo $value;
}

?>