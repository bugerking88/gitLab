<?php
header("content-type: text/html; charset=utf-8");
$a = array('xxx', 'book' => '書籍', 'yyy', 'desk' => '書桌', 'pen' => '筆');
//'yyy' 編號是1
foreach ($a as $k => $s)
{
	 echo "$k = $s<br>";
}

?>