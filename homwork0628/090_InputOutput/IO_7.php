<?php
header("content-type: text/html; charset=utf-8");
 
$sData = "";

$f = fopen("data.txt", "r");//"r" read
while (!feof($f))//eof end of file
{
	$line = fgets($f);//讀一行當成字串
	$sData .= Trim($line) . "<br>";
}
fclose($f);
echo $sData;

?>
