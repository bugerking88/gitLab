<?php
$f = fopen("pick3.txt", "r");//第二個引數 設定R 代表只能讀不能寫
while (!feof($f))//eof end of file
{
	$line = fgets($f);//只抓單行
	echo "$line<br>";
}
fclose($f);
echo "--End--";
?>