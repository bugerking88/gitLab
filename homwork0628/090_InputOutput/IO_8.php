<?php
header("content-type: text/html; charset=utf-8");
 
$sData = "line1\nline2\nLine3\n";
$dataArray = explode("\n", $sData);
$f = fopen("data2.txt", "w");//w+,r+,b,w,r
foreach ($dataArray as $line) {
	fputs($f, $line . "\n", strlen($line) + 1);//有換行 長度要加一
}
fclose($f);
echo "-- Done --"

?>
