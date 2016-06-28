<?php
	$testArray = array("A1", "A2", "A18");
	sort($testArray);//对数组中的元素按字母进行升序排序：
	var_dump($testArray);
	
	echo "<br />";
	
	natsort($testArray);//在自然排序算法中，数字 2 小于 数字 10。在计算机排序算法中，
	//10 小于 2，因为 "10" 中的第一个数字小于 2。
	var_dump($testArray);
?>
