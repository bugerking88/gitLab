<?php
header("content-type: text/html; charset=utf-8");
	$contents = file_get_contents('data.txt');//整個讀成字串
	echo (str_replace("\r\n", "<br />", $contents));
?>